$(document).ready(function() {

    var sortBy = $('.location-id');
    if ( sortBy.length>0 ){
        var locationID = sortBy.html();
        console.log(locationID);
        $('.district-select').children('option').each(function() {
            if ($(this).val() == locationID){
                console.log($(this).val());
                $(this).attr('selected', 'selected');
            }
        })
    }

    var districtSelect = $('.district-select');
    if ( districtSelect.length > 0 ) {
        districtSelect.select2({
            width: 'style'
        });
    }

    var fancybox;
    var fancyboxLink = $('.fancybox');
    if (fancyboxLink.length>0){
        fancybox = fancyboxLink.fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        })
    }

    var itemRow = $('.item-row');
    if ( itemRow.length>0){
        itemRow.each(function(){
            var maxHeight;
            var first = $(this).find('.profile-item:first-child');
            var second = $(this).find('.profile-item:nth-child(2)');
            if ( second.innerHeight() > first.innerHeight() ) {
                maxHeight = second.innerHeight()
            } else {
                maxHeight = first.innerHeight();
            }
            first.css('height', maxHeight + 'px');
            second.css('height', maxHeight + 'px');
        })
    }

    var opAllPho =  $('.js__open_all_photos');
    if (opAllPho.length>0){
        opAllPho.on('click', function(e){
            e.preventDefault();
            $(this).parent('.left').children('.photos-hidden').slideDown();
            $(this).parent('.left').find('.fancybox').attr('rel', 'group');
            $(this).fadeOut();
            console.log(fancybox);
            $.fancybox.open(fancybox, [{
                helpers: {
                    overlay: {
                        locked: false
                    }
                }
            }]);
        });
    }
});