<?php include('header.php');?>

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-3" style="position:fixed">
            <div class="card border-0 shadow-sm">
                <div class="card-body m-0 p-0">
                    <?php include('sidebar.php');?>
                </div>
            </div>
        </div>
        <div class="col-8 offset-3 mt-4 mr-5">
            <div class="row">
                <div class="col-12 ml-5">
                   <div class="alert alert-danger" role="alert">This Section Is Temporarily Pending For Some Reason...</div>
                    <?php
                         $dataPoints = array(
                            array("x" => 1483381800000 , "y" => $this->datawork->count_data('add_vehicle',['arrival_time'=>date('d')])),
                            array("x" => 1483468200000 , "y" => 700),
                            array("x" => 1483554600000 , "y" => 710),
                            array("x" => 1483641000000 , "y" => 658),
                            array("x" => 1483727400000 , "y" => 734),
                            array("x" => 1483813800000 , "y" => 1200),
                            array("x" => 1483900200000 , "y" => 847),
                            array("x" => 1483986600000 , "y" => 853),
                            array("x" => 1484073000000 , "y" => 869),
                            array("x" => 1484159400000 , "y" => 943),
                            array("x" => 1484245800000 , "y" => 970),
                            array("x" => 1484332200000 , "y" => 869),
                            array("x" => 1484418600000 , "y" => 890),
                            array("x" => 1484505000000 , "y" => 930)
                         );

                        ?>

                        <script>
                            window.onload = function () {

                            var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2",
                            axisX: {
                                valueFormatString: "<?= date('d M');?>"
                            },
                            axisY: {
                                title: "Previous Days Entry Report",
                                maximum: 1200
                            },
                            data: [{
                                type: "splineArea",
                                color: "#6599FF",
                                xValueType: "dateTime",
                                xValueFormatString: "DD MMM",
                                yValueFormatString: "#,##0 Entry",
                                dataPoints: <?php echo json_encode($dataPoints); ?>
                            }]
                        });

                        chart.render();

                        }
                        </script>

                        <div class="container-fluid mt-4">
                            <div class="row">
                                <div class="col-lg-12 mx-auto">
                                    <div class="card border-0 shadow-none">
                                        <div class="card-body">
                                            <h2 class="h6"><i class="fas fa-chart-line"></i>&nbsp; Reports...</h2><br>
                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
