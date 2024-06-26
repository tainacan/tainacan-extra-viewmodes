<template>
    <div 
            id="grid-gallery" 
            class="gallery-view-mode grid-gallery">

        <section class="grid-wrap">
            <!-- Empty result placeholder -->
            <section
                    v-if="!isLoading && items.length <= 0"
                    class="section">
                <div class="content has-text-gray4 has-text-centered">
                    <p>
                        <span class="icon is-large">
                            <i class="tainacan-icon tainacan-icon-36px tainacan-icon-items" />
                        </span>
                    </p>
                    <p>{{ __('No item found', 'tainacan-extra-viewmodes') }}</p>
                </div>
            </section>

            <!-- SKELETON LOADING -->
            <div
                    v-if="isLoading"
                    class="tainacan-masonry-container--skeleton">
                <div 
                        :key="item"
                        v-for="item in 12"
                        :style="{'min-height': randomHeightForMasonryItem() + 'px' }"
                        class="skeleton" />
            </div>

            <ul class="grid">

                <li class="grid-sizer"></li><!-- for Masonry column width -->
                <li v-for="(item, index) of items" :key="index">
                    <figure>
                        <img 
                            :alt="item.thumbnail_alt ? item.thumbnail_alt : $i18n.get('label_thumbnail')"
                            v-if="item.thumbnail != undefined"
                            :src="item['thumbnail']['tainacan-medium-full'] ? item['thumbnail']['tainacan-medium-full'][0] : (item['thumbnail'].medium ? item['thumbnail'].medium[0] : thumbPlaceholderPath)">  
                        <figcaption>
                            <h3>
                                <template 
                                        v-for="(column, metadatumIndex) in displayedMetadata"
                                        :key="metadatumIndex">
                                    <span 
                                            v-if="column.display && column.metadata_type_object != undefined && (column.metadata_type_object.related_mapped_prop == 'title')"
                                            v-html="item.metadata != undefined && collectionId ? renderMetadata(item.metadata, column) : (item.title ? item.title :`<span class='has-text-gray3 is-italic'>` + $i18n.get('label_value_not_provided') + `</span>`)" />   
                                </template>
                            </h3>
                            <div>
                                <p v-html="renderTheSecondaryMetadata(item)" />   
                            </div>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </section>

        <section class="slideshow">
            <ul>
                <li v-for="(item, index) of items" :key="item.id">
                    <figure>
                        <figcaption>
                            <h3>
                                <template 
                                        v-for="(column, metadatumIndex) in displayedMetadata"
                                        :key="metadatumIndex">
                                    <span 
                                            v-if="column.display && column.metadata_type_object != undefined && (column.metadata_type_object.related_mapped_prop == 'title')"
                                            v-html="item.metadata != undefined && collectionId ? renderMetadata(item.metadata, column) : (item.title ? item.title :`<span class='has-text-gray3 is-italic'>` + $i18n.get('label_value_not_provided') + `</span>`)" />
                                </template>
                            </h3>
                            <a target="_blank" :href="getItemLink(item.url, index)">
                                <span>{{ __('View item on page', 'tainacan-extra-viewmodes') }}</span>
                                <span class="icon">
                                    <i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-see" />
                                </span>
                            </a>
                        </figcaption>
                        <img 
                            :alt="item.thumbnail_alt ? item.thumbnail_alt : $i18n.get('label_thumbnail')"
                            v-if="item.thumbnail != undefined"
                            :src="item['thumbnail']['full'] ? item['thumbnail']['full'][0] : (item['thumbnail'].large ? item['thumbnail'].large[0] : thumbPlaceholderPath)">  
                    </figure>
                    <div 
                            class="list-metadata"
                            :class="showMetadataPanel ? 'expanded' : 'collapsed'">
                        <div 
                                @click="showMetadataPanel = !showMetadataPanel"
                                class="list-metadata__header">
                            <span style="cursor: pointer;">{{ showMetadataPanel ? __('Hide metadata', 'tainacan-extra-viewmodes') : __('Show metadata', 'tainacan-extra-viewmodes') }}</span>
                            <span class="icon" style="margin-right: auto;">
                                <i 
                                        class="tainacan-icon tainacan-icon-1-25em"
                                        :class="showMetadataPanel ? 'tainacan-icon-arrowdown' : 'tainacan-icon-arrowup'" />
                            </span>
                            <a 
                                    v-if="isSlideshowViewModeEnabled"
                                    @click.prevent="starSlideshowFromHere(index)">
                                <span>{{ __('View Document on fullscreen', 'tainacan-extra-viewmodes') }}</span>
                                <span class="icon">
                                    <i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-viewgallery" />
                                </span>
                            </a>
                        </div>
                        <template 
                                v-for="(column, metadatumIndex) in displayedMetadata"
                                :key="metadatumIndex">
                            <span 
                                    :class="{ 'metadata-type-textarea': column.metadata_type_object.component == 'tainacan-textarea' }"
                                    v-if="renderMetadata(item.metadata, column) != '' && column.display && column.slug != 'thumbnail' && column.metadata_type_object != undefined && (column.metadata_type_object.related_mapped_prop != 'title')">
                                <h3 class="metadata-label">{{ column.name }}</h3>
                                <p      
                                        v-html="renderMetadata(item.metadata, column)"
                                        class="metadata-value"/>
                            </span>
                        </template>
                    </div>
                </li>
            </ul>
            <nav>
                <span class="icon nav-prev"></span>
                <span class="icon nav-next"></span>
                <span class="icon nav-close"></span>
            </nav>
        
        </section>
    </div>
</template>

<script>
import qs from 'qs';

export default {
    name: "ViewModeGallery",
    data() {
        return {
            thumbPlaceholderPath: tainacan_plugin.base_url + '/assets/images/placeholder_square.png',
            isSlideshowViewModeEnabled: false,
            showMetadataPanel: false,
            CBPGridGalleryObject: null
        }
    },
    props: {
        collectionId: [Number,String],
        termId: [Number,String],
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
    watch: {
        isFiltersMenuCompressed() {
            if (Masonry.currentMasonryInstance) {
                setTimeout(() => {
                    Masonry.currentMasonryInstance.layout();
                }, 
                1000);
            }
        },
        isLoading: {
            handler(value) {
                const galleryElement = document.getElementById('grid-gallery');
                if (!value && galleryElement) {
                    
                    // Resets current
                    if (Masonry.currentMasonryInstance)
                        Masonry.currentMasonryInstance.destroy();

                    this.showMetadataPanel = false;

                    if ( this.CBPGridGalleryObject === null )
                        this.CBPGridGalleryObject = new CBPGridGallery( galleryElement );
                    else
                        this.CBPGridGalleryObject._init(galleryElement);
                }
            },
            immediate: true
        }
    },
    computed: {
        __() {
            return wp.i18n ? wp.i18n.__ : ((str, ctx) => str)
        },
        queries() {
            let currentQueries = (this.$route && this.$route.query) ? JSON.parse(JSON.stringify(this.$route.query)) : {};
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
                this.queries['source_list'] = this.termId ? 'term' : (!this.collectionId || this.collectionId == 'default' ? 'repository' : 'collection');
                if ( this.$route && this.$route.path )
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
        renderTheSecondaryMetadata(item) {
            let metadataHtml = '';
            for (let i = 1; i < this.displayedMetadata.length; i++) {
                if (this.displayedMetadata[i].display && this.displayedMetadata[i].metadata_type_object != undefined && (this.displayedMetadata[i].metadata_type_object.related_mapped_prop != 'title') )
                    return this.renderMetadata(item.metadata, this.displayedMetadata[i]);
            }
            return metadataHtml;
        },
        randomHeightForMasonryItem() {
            let min = 120;
            let max = 380;

            return Math.floor(Math.random()*(max-min+1)+min);
        },
        async starSlideshowFromHere(index) {
            if ( this.$router && this.$route && this.$route.query )
                await this.$router.replace({ query: {...this.$route.query, ...{'slideshow-from': index } }}).catch((error) => this.$console.log(error));
        }
    },
    beforeDestroy() {
        if (Masonry.currentMasonryInstance)
            Masonry.currentMasonryInstance.destroy();
    }
}
</script>
