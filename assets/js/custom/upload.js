var xls = $('.show_xls');
var table_data;
var ExcelToJSON = function () {
    this.parseExcel = function (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function (sheetName) {
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                var obj = JSON.parse(json_object);
                var columns = [];
                Object.keys(obj[0]).forEach(key => {
                    columns.push({title: key, field: key, editor: "input"});
                });
                table_data = new Tabulator("#table", {
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
                $('#edited_data').show();
                
            })
        };

        reader.onerror = function (ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    };
};

function handleFileSelect(evt) {
    var files = evt.target.files;
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
}

var obj;
$('#edited_data').click(() => {
    var data = table_data.getData();
    //console.log(data);
    data.forEach(el => {
        score = new Object();
        Object.keys(el).forEach(month => {
            if(checkIsScore(month)) {
                score[month] = el[month];
            }
        })
        var spoc_id = el['SPOC ID'];
        var ps_id = el['PS ID'];
        var employee_name = el['EMPLOYEE NAME'];
        var before_iiy = el['BEFORE IIY'];
        var after_iiy = el['AFTER IIY'];
        var team = el['TEAM'];
        var sub_team = el['SUB TEAM'];
        var level = el['LEVEL'];
        var doj = el['DOJ'];
        var last_promo = el['LAST PROMO'];
        var tl_id = el['TL EMP_ID'];
        var tl_email = el['TL EMAIL_ID'];
        var param = { spoc_id, ps_id, employee_name,  before_iiy,  after_iiy,  team,  sub_team, level, doj, last_promo, tl_id, tl_email};
        $.post('../controller/upload.php', { param, score}, function(data){
            console.log(data);
        })
    })
})

function checkIsScore(str) {
    return !isNaN(parseInt(str.slice(-2)));
}

document.getElementById('upload_xls').addEventListener('change', handleFileSelect, false);



