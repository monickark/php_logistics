<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?>



<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!-- Ignite UI Required Combined CSS Files -->
    <link href="http://cdn-na.infragistics.com/igniteui/2017.2/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2017.2/latest/css/structure/infragistics.css" rel="stylesheet" />
    <link href="http://cdn-na.infragistics.com/igniteui/2017.2/latest/css/structure/modules/infragistics.ui.treegrid.css" rel="stylesheet" />

    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <!-- Ignite UI Required Combined JavaScript Files -->
    <script src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/infragistics.core.js"></script>
    <script src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/infragistics.lob.js"></script>
</head>
<body>
<div class="wrapper">
    <table id="treegrid1"></table>
</div>
    <script>
        $(function () {

            var dataSource = [
                {
                    "number": "1000", "name": "Assets", "balance": "", "assets": [
                        {
                            "number": "1003", "name": "Fixed assets", "balance": "", "assets": [
                                {
                                    "number": "1115", "name": "Lands and Buildings", "balance": "", "assets": [
                                        { "number": "1120", "name": "Lands and Buildings", "balance": 167 },
                                        { "number": "1130", "name": "Increases during the year", "balance": 147 },
                                        { "number": "1140", "name": "Decreases during the year", "balance": 345 },
                                        { "number": "1132", "name": "Accum. Depreciation, Buildings", "balance": 526 },
                                        { "number": "1142", "name": "Lands and Buildings, Total", "balance": 953 }
                                    ]
                                },
                                {
                                    "number": "1200", "name": "Operating Equipment", "balance": "", "assets": [
                                        { "number": "1290", "name": "Operating Equipment, Total", "balance": 998 }
                                    ]
                                },
                                {
                                    "number": "1300", "name": "Vehicles", "balance": "", "assets": [
                                        { "number": "1390", "name": "Vehicles, Total", "balance": 758 }
                                    ]
                                },
                                { "number": "1990", "name": "Fixed assets, Total", "balance": 1128 }
                            ]
                        },
                        {
                            "number": "2000", "name": "Current assets", "balance": "", "assets": [
                                {
                                    "number": "1125", "name": "Inventory", "balance": "", "assets": [
                                        { "number": "1121", "name": "Resale Items", "balance": 507 },
                                        { "number": "1131", "name": "Finished Goods", "balance": 135 },
                                        { "number": "1141", "name": "Raw Material", "balance": 497 },
                                        { "number": "1131", "name": "Inventory, Total", "balance": 897 }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ];

            $("#treegrid1").igTreeGrid({
                width: "100%",
                dataSource: dataSource,
                autoGenerateColumns: false,
                primaryKey: "number",
                columns: [
                    { headerText: "Number", key: "number", width: "40%", dataType: "number" },
                    { headerText: "Name", key: "name", width: "40%", dataType: "string" },
                    { headerText: "Balance", key: "balance", width: "20%", dataType: "number", formatter: balanceSum, template: "$ ${balance}" }
                ],
                childDataKey: "assets",
                initialExpandDepth: 3,
                features: [
                    {
                        name: "Resizing"
                    },
                    {
                        name: "ColumnMoving",
                        columnMovingDialogContainment: "window"
                    }
                ]
            });
        });
        function balanceSum(val, record) {
            if (val) {
                return val;
            }
            return calcSum(record, 0);
        }
        function calcSum(row, sum) {
            var i, child;
            if (row["assets"]) {
                for (i = 0; i < row["assets"].length; i++) {
                    child = row["assets"][i];
                    sum = child["assets"] ? calcSum(child, sum) : sum + calcSum(child, sum);
                }
                return sum;
            }
            return row["balance"];
        }

    </script>
</body>
</html>