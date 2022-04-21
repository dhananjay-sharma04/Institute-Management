$(()=>{
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'home'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
})
function showstudents(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'showstudents'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 

function addstudent(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'addstudent'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
function std_attend(stdclass = '%'){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'std_attend',
            stdclass: stdclass
        }, 
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 
function showteacher(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'view_teacher'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
 } 
 function addteacher(e){
     $.ajax({
         type: "POST",
         url:'admin/admin_ajax.php',
         data:{
             request: 'add_teacher'
         },
         success:(e)=>{
             $('#main-content').html(e)
         }
     });
 }
 function showstudents_teacher(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'showstudents_teacher'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 
 function show_inquiry(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'show_inquiry'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
 }
 function send_hw(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'send_hw'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
 function view_hw(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'view_hw'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 
 function view_hm_std(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'view_hm_std'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 
 function view_attend_std(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'view_attend_std'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 
 function update(e){
    $.ajax({
        type: "POST",
        url: 'admin/admin_ajax.php',
        data: {
            request: 'update'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
} 