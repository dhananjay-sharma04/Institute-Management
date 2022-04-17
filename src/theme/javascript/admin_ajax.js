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
// function updatestudent(e3){
//     $.ajax({
//         type: "POST",
//         url: 'admin/admin_ajax.php',
//         data: {
//             request: 'updatestudent'
//         },
//         success: (e)=>{
//             $('#main-content').html(e)
//         }
//       });
// }
// function deletestudent(e4){
//     $.ajax({
//         type: "POST",
//         url: 'admin/admin_ajax.php',
//         data: {
//             request: 'deletestudent'
//         },
//         success: (e)=>{
//             $('#main-content').html(e)
//         }
//       });
// }

function std_attend(stdclass = 0){
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