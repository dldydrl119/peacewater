$(document).ready(function(){
     function indexdev() {
         this.index = function() {
           $('body').on('click', '.list-box', function() {
             var idx = $(this).attr('data-idx');
             var result = json('/sub/newsViewData/'+idx);
             $('.modal-body .title').text(result[0].news_title);
             $('.modal-body .contents').html(result[0].news_content);

           });



         }
     }
     indexdev = new indexdev();
     indexdev.index();
});