$(document).ready(function() {
    $.post('../controller/master.php', {"tl_id" : $tl_id, "emp_id" : "", "config": "get_score"}, function(data) {
        var obj = JSON.parse(data);
        if(obj.length != 0) {
            var columns = [];
            Object.keys(obj[0]).forEach(key => {
                columns.push({title: key, field: key, headerFilter:true});
            });
            columns.push({title:"Driver", field:"car", align:"center", formatter:"tickCross",  headerFilter:"input"})
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