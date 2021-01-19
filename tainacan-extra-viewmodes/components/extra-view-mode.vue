<template>
	<div class="container">	
		<div id="gr-gallery" class="test-item-view-mode gr-gallery">

            <div class="gr-main" style="display: none;">
                <!-- -->
            </div>

			<div class="gr-main">
				<figure v-for="(item, index) of items" :key="index">
					<div>
						<img 
								:alt="item.thumbnail_alt ? item.thumbnail_alt : $i18n.get('label_thumbnail')"
								v-if="item.thumbnail != undefined"
								:src="item['thumbnail']['tainacan-medium'] ? item['thumbnail']['tainacan-medium'][0] : (item['thumbnail'].medium ? item['thumbnail'].medium[0] : thumbPlaceholderPath)">  
					</div>
					<figcaption>
						<h2><span>{{ item.title }}</span></h2>
						<div><p>{{ item.description }}</p></div>
					</figcaption>
				</figure>
			</div>

            <nav>
                <span class="gr-prev">prev</span>
                <span class="gr-next">next</span>
            </nav>

            <div class="gr-caption">
                <span class="gr-caption-close">x</span>
            </div>
		</div>
	</div>
</template>

<script>
export default {
    name: "ViewModeExtraTest",
    data() {
        return {
            thumbPlaceholderPath: tainacan_plugin.base_url + '/assets/images/placeholder_square.png',
            isSlideshowViewModeEnabled: false
        }
    },
    props: {
        collectionId: Number,
        displayedMetadata: Array,
        items:  {
            type: Array,
            default: () => [],
            required: true
        },
        isLoading: false,
        totalItems: Number,
        isFiltersMenuCompressed: Boolean,
        enabledViewModes: Array
	},
    computed: {
        queries() {
            let currentQueries = JSON.parse(JSON.stringify(this.$route.query));
            if (currentQueries) {
                delete currentQueries['view_mode'];
                delete currentQueries['fetch_only'];
                delete currentQueries['fetch_only_meta'];
            }
            return currentQueries
        }
    },
    mounted() {
        this.isSlideshowViewModeEnabled = this.enabledViewModes.findIndex((viewMode) => viewMode == 'slideshow') >= 0;
    },
    methods: {
        getItemLink(itemUrl, index) {
            if (this.queries) {
                // Inserts information necessary for item by item navigation on single pages
                this.queries['pos'] = ((this.queries['paged'] - 1) * this.queries['perpage']) + index;
                this.queries['source_list'] = this.$root.termId ? 'term' : (!this.$root.collectionId || this.$root.collectionId == 'default' ? 'repository' : 'collection');
                this.queries['ref'] = this.$route.path;
                return itemUrl + '?' + qs.stringify(this.queries);
            }
            return itemUrl;
        },
        renderMetadata(itemMetadata, metadatum) {
            let metadata = (itemMetadata && itemMetadata[metadatum.slug] != undefined) ? itemMetadata[metadatum.slug] : false;

            if (!metadata)
                return '';
            else
                return metadata.value_as_html;
        },
        starSlideshowFromHere(index) {
            this.$router.replace({ query: {...this.$route.query, ...{'slideshow-from': index } }}).catch((error) => this.$console.log(error));
        }
    }
}
</script>
