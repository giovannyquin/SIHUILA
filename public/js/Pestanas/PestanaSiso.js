   
   if ( $ ('.btn-delete').length)
   {
       $(".btn-delete").click(function () { 
//          var id = $(this).data('id');
//          $(this).parent('div').fadeOut(1000); 
          
         var id = $(this).data('id');
         var topo = $(this).data('topologia');
         var asunto = $(this).data('asunto');
         var form = $('#form-delete');
         var action1 = form.attr('action').replace('ID', id);
         var action2 = form.attr('action').replace('TOPOLOGIA', topo);
         var action3 = form.attr('action').replace('ASUNTO', asunto);
         var row =  $(this).parents('div');
         
         row.fadeOut(1000);
         
         $.post(action1, action2, action3, form.serialize(), function(result) {
            if (result.success) {
               setTimeout (function () {
                  row.delay(1000).remove();
                  alert(result.msg);
               }, 1000);                
            } else {
               row.show();
            }
         }, 'json');
       });
   }




    