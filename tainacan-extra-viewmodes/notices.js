// Checks if document is loaded
const tainacanExtraViewModesPerformWhenDocumentIsLoaded = callback => {
    if (/comp|inter|loaded/.test(document.readyState))
        cb();
    else
        document.addEventListener('DOMContentLoaded', callback, false);
}

tainacanExtraViewModesPerformWhenDocumentIsLoaded(function() {
    setTimeout(function() {
        const notificationDismiss = document.querySelector('#tainacan-extra-viewmodes-plugin-deprecation-notification .notice-dismiss');
    
        if (notificationDismiss) {
            notificationDismiss.addEventListener('click', function(event) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', ajaxurl);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('action=dismiss_notification');
            });
        }
    }, 250)
});