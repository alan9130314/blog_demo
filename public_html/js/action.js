$(document).ready(function () {

    //template
    var source = $('#post-template').html();
    var postTemplate = Handlebars.compile(source);

    var postListUI = '';
    $.each(posts,function(index,post){
        postListUI = postListUI + postTemplate(post);
    });
    $('#posts').find('.board').append(postListUI);

    $('.index').click(function(e){
        location.reload();
    });

    $('.category').click(function(e){
        console.log('press cate');        
        var id = $(e.currentTarget).data('category_id')
        $('.post-block').remove();
        console.log(id);
        $.post("post/category.php",{category_id : id},
            function (data, textStatus, jqXHR) {
                console.log(data);
                var postListUI = '';
                $.each(data,function(index,post){
                    postListUI = postListUI + postTemplate(post);
                });
                $('#posts').find('.board').append(postListUI);
            });
            
    });

    
    $('#blog').on('click','.post-category',function (e) {
        console.log('press pst cate');
        var id = $(e.currentTarget).data('category_id');
        $('.post-block').remove();
        $.post("post/category.php",{category_id : id},
            function (data, textStatus, jqXHR) {
                console.log(data);
                var postListUI = '';
                $.each(data,function(index,post){
                    postListUI = postListUI + postTemplate(post);
                });
                $('#posts').find('.board').append(postListUI);
            });
    });


    var panel={
        el:'#post-panel',
        selectedPost:null,
        init:function () {
            panel.clear();
        },
        clear:function () {
            $(panel.el).find('select').val('');
            $(panel.el).find('input').val('');
            $(panel.el).find('textarea').val('');
        },
        open:function () {
            panel.init();

            $(panel.el).addClass('open')
            .find('textarea').focus();
        },
        close:function () {
            $(panel.el).removeClass('open');
        },

    }

    $('.nav-item_write').click(function(e){
        
        panel.open();
        $(panel.el).addClass('new').removeClass('update');
    });


    $('.board').on('dblclick','.post-block',function (e) {
        panel.selectedPost = $(e.currentTarget);
        $(panel.el).addClass('open').addClass('update').removeClass('new');
        var id = $(this).data('id');
        //ajax call - get event detail
        //load detail back to panel 
        $.post("post/read.php", {id:id},
            function (data, textStatus, jqXHR) {
                $(panel.el).find('[name="id"]').val(data.id);
                $(panel.el).find('[name="category_id"]').val(data.category_id);
                $(panel.el).find('[name="title"]').val(data.title);
                $(panel.el).find('[name="content"]').val(data.content);    
        });

    });

    $(panel.el)
        .on('click','button',function (e) {
            if ($(this).is('.create') || $(this).is('.update')){
                if ($(this).is('.create'))
                    var action = "post/create.php";
                if ($(this).is('.update'))
                    var action = "post/update.php"
                
                //collect data                
                var data = $(panel.el).find('form').serialize();
                
                //ajax call -create api
                $.post(action, data,
                    function (data, textStatus, jqXHR) {
                        if ($(e.currentTarget).is('.create')){
                            var postUI = postTemplate(data);
                            $('#posts').find('.board').prepend(postUI);
                        }
                        if ($(e.currentTarget).is('.update')){
                            var postUI = postTemplate(data);
                        }
                    }); 
                panel.close();
                
                    
            }

            if($(this).is('.cancel')){
                panel.close();
                
            }
            if($(this).is('.delete')){
                var result = confirm('delete this post?');
                
                if (result){
                    var id = panel.selectedPost.data('id'); 
                    $.post("post/delete.php", {id:id})
                        .done(function() {
                            panel.selectedPost.remove();
                            panel.close();
                        });
                }
            }
    })
    .on('click','.close',function (e) {
       $('button.cancel').click();
    });

    
    

});