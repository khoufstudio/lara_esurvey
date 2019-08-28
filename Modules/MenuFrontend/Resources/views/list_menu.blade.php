@extends('layouts.openwindow')



@section('content')
  <div class="row">
    <div class="col-md-10 offset-1">
      

      <div class="content d-flex justify-content-center align-items-center">

        <!-- Container -->
        <div class="flex-fill">

         

          <!-- Error content -->
          <div class="row">
            
            <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">
                <div class="alert alert-info">
                    Klik pada menu untuk memilih parrent
                  </div>
              <div class="card p-2">
                @php
                  list_tree_menu()
                @endphp
              </div>


          
              
            </div>
          </div>
          <!-- /error wrapper -->

        </div>
      </div>
      </div>

  </div>

@endsection
@section('script')
<script>
  $.fn.extend({
      treed: function (o) {
        
        var openedClass = 'icon-plus-circle2';
				var closedClass = 'icon-minus-circle2';
        
        if (typeof o != 'undefined'){
          if (typeof o.openedClass != 'undefined'){
          openedClass = o.openedClass;
          }
          if (typeof o.closedClass != 'undefined'){
          closedClass = o.closedClass;
          }
        };
        
          //initialize each of the top levels
          var tree = $(this);
          tree.addClass("tree");
          tree.find('li').has("ul").each(function () {
              var branch = $(this); //li with children ul
              branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
              branch.addClass('branch');
              branch.on('click', function (e) {
                  if (this == e.target) {
                      var icon = $(this).children('i:first');
                      icon.toggleClass(openedClass + " " + closedClass);
                      // $(this).children().children().toggle();
                  }
              })
              // branch.children().children().toggle();
          });
          //fire event from the dynamically added icon
        // tree.find('.branch .indicator').each(function(){
        //   $(this).on('click', function () {
        //       $(this).closest('li').click();
        //   });
        // });
        //   //fire event to open branch if the li contains an anchor instead of text
        //   tree.find('.branch>a').each(function () {
        //       $(this).on('click', function (e) {
        //           $(this).closest('li').click();
        //           e.preventDefault();
        //       });
        //   });
        //   //fire event to open branch if the li contains a button instead of text
        //   tree.find('.branch>button').each(function () {
        //       $(this).on('click', function (e) {
        //           $(this).closest('li').click();
        //           e.preventDefault();
        //       });
        //   });
      }
  });
  
  //Initialization of treeviews
  
  $('#tree1').treed();
  
  $('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});
  
  $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});


  function getMenu(id_menu, namaMenu){

    window.opener.document.getElementById('parrent').value = namaMenu;
    window.opener.document.getElementById('id_parrent').value = id_menu;
    window.close();
  }
  </script>
@endsection
