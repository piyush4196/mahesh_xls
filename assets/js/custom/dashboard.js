$(document).ready(function() {
    var tl_id = $('#tl_id');
    $.post('../controller/master.php', { config: 'tl_id'}, function(data){
        var obj = JSON.parse(data);
        obj.forEach(element => {
            tl_id.append(new Option(element['tl_id'], element['tl_id']));
        });
    })

   

})

$('#tl_id').change(function() {
    var emp_id = $('#emp_id');
    $.post('../controller/master.php', { config: 'employee', tl_id : $(this).val() }, function(data) {
        var obj = JSON.parse(data);
        obj.forEach(element => {
            emp_id.append(new Option(element['ps_id'], element['id']));
        });
    })
})

$('form#getUserScore').submit(function(e) {
    e.preventDefault();
    $.post('../controller/master.php', {"tl_id" : $('#tl_id').val(), "emp_id" : $('#emp_id').val(), "config": "get_score"}, function(data) {
        var obj = JSON.parse(data);
        if(obj.length != 0) {
            var columns = [];
            Object.keys(obj[0]).forEach(key => {
                columns.push({title: key, field: key, headerFilter:true});
            });
            new Tabulator("#table", {
                                data:obj,
                                layout:"fitColumns",
                                responsiveLayout:"hide",
                                tooltips:true,
                                addRowPos:"top",
                                history:true,
                                pagination:"local",
                                paginationSize:7,
                                movableColumns:true,
                                resizableRows:true,
                                columns:columns
                            });
        }
        
    })
})