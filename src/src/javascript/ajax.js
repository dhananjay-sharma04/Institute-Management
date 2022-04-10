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

function showStudents(el){
    $.ajax({
        type: "POST",
        url: 'admin/ajax.php',
        data: {
            request: 'showStudents'
        },
        success: (e)=>{
            $('#main-content').html(e)
        }
      });
}