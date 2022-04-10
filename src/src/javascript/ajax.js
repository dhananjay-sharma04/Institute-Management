$(()=>{

    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'home'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
})

function showstudents(el){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'showstudents'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
function addstudent(e2){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'addstudent'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
function updatestudent(e3){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'updatestudent'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
function deletestudent(e4){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'deletestudent'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}
function std_attend(e5){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'std_attend'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}