@extends('layouts.header')

@section('content')
<!--start sectiion one about the top header of the page conatint avg numberuser two button-->

<div class="myheader">
    <div class="container">
        <div class="row text-center">
            <div class=" myhead-anlys col-md-3 col-sm-6">
                <!--first anaulse عدد اصحاي العهد-->
                <div class="label-anlys">
                    <i class="fa fa-user fa-2x fa-fw"></i><span>اصحاب العهد </span>
                </div>
                <span class="his-type">
						<bdi class="number_his-coves">2500</bdi>
					</span>
                <div class="comp-time">
                    <bdi> 4% </bdi> <span>من الاسبوع الماضى</span>
                </div>
            </div>
            <div class=" myhead-anlys col-md-3 col-sm-6">
                <div class="label-anlys">
                    <i class="fa fa-pie-chart fa-2x fa-fw"></i><span>متوسط الصرف</span>
                </div>
                <span class="his-type">
						<bdi class="number_avg">135.5</bdi>
					</span>
                <div class="comp-time">
                    <bdi> <i class="fa fa-chevron-up"></i>  4% </bdi> <span>من الاسبوع الماضى</span>
                </div>
            </div>
            <div class=" myhead-anlys col-md-3 col-sm-6">
                <div class="label-anlys">
                    <i class="fa fa-shopping-bag fa-2x fa-fw"></i><span>المتاح حالبا</span>
                </div>
                <span class="his-type">
						<bdi class="number_avg">2,500</bdi>
					</span>
                <div class="comp-time
				   ">
                    <bdi class="chevron-down"> <i class="fa fa-chevron-down"></i>  4% </bdi> <span>من الاسبوع الماضى</span>
                </div>
            </div>
            <div class=" myhead-anlys col-md-3 col-sm-6">
                <button class="btn btn-info btn-block btn-lg report1"><i class="fa fa-file-text"></i> <span>طباعة تقرير</span></button>
                <button class="btn btn-primary btn-block btn-lg report2"><i class="fa fa-file-pdf-o"></i> <span>طباعة تقرير2</span></button>
            </div>
        </div>
    </div>
</div>
<!-- ========================================================	-->
<!--start section two about the main grap and the the main info about the the stores containt -->
<div class="main-graph">
    <div class="container">
        <!--====== header of main graph ========-->
        <div class="header-main-graph">
            <div class="row">
                <div class="col-md-6 label-graph">
                    <p class="lead">احصائيات الصرف والاضافه لجميع المخازن</p>
                </div>
                <div class="col-md-6   peroid">
                    <div class="row">
                        <div class="col-xs-6 myselect">
                            <label>
			   	       	   	<i class="fa fa-calendar fa-2x fa-fw"></i>
			   	       	   </label>
                            <select name="slecttime1" class="selectbox"><!--start time-->
							 <option value="25-3-2016">october 25,2017</option>
						    </select>
                        </div>
                        <div class="col-xs-6 myselect select-box">
                            <label>
			   	       	   	<i class="fa fa-calendar fa-2x fa-fw"></i>
			   	       	   </label>
                            <select name="slecttime2" class="selectbox"><!--end time-->
								<option value="25-4-2016">october 25,2017</option>
							 </select>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--===================================================-->

        <!--==========================the main graph real grap =======-->
        <div class="graph">
            <div class="row">
                <div class="col-md-8">
                    <canvas id="canvas-stores-graph"></canvas>
                </div>
                <div class="col-md-4">
                    <!--this is progrss bar where describe the stores state-->
                    <h2>نسبة المصروف فى كل مخزن</h2>
                    <div class="myprogressinfo">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 infoStorProg">
                                <!--محزن المستديم-->
                                <label>مخزن المستديم</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%"><span>مصرف <bdi>80 %</bdi></span></div>
                                </div>
                            </div>
                            <div class="col-md-12  col-sm-6infoStorProg">
                                <!--مخزن المستهلك-->
                                <label>مخزن المستهلك</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:40%"><span>مصرف <bdi>40 %</bdi></span></div>
                                </div>
                            </div>
                            <div class="col-md-12  col-sm-6 infoStorProg">
                                <!--مخزن الخامات-->
                                <label>مخزن الخامات</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:60%"><span>مصرف <bdi>60 %</bdi></span></div>
                                </div>
                            </div>
                            <div class="col-md-12  col-sm-6 infoStorProg">
                                <!-- محزن الكهنه-->
                                <label>محزن الكهنه</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:30%"><span>مصرف <bdi>30 %</bdi></span></div>
                                </div>
                            </div>
                        </div>
                        <!--			     			000000000000000-->
                    </div>


                </div>
            </div>

        </div>
        <!--=================================================================-->

    </div>

</div>
<!-- =========================================================   -->
<!--=================================================================
		   ssistant graphas containt sample grap present the date in each stores 
		===================================================================-->
<div class="assistant-graphs">
    <div class="container">
        <div class="mygraps">
            <div class="row">
                <div class="col-md-4 mygraphs-tor">
                    <div class="theinfo">
                        <div class="h2">
                            <span>العهد </span>
                            <div class="option">
                                <i class="fa fa-gears select-pos"></i>
                                <!--option for the select the time-->
                                <select name="thetime" class="selectbox">
											<option value="1">الاسبوع الماضى </option>
											<option value="2">الشهر الماضى</option>
											<option value="3">اليوم</option>
										</select>
                            </div>

                        </div>
                        <div class="mycontent">
                            <div class="row">
                                <div class="col-md-12 col-sm-6 infoStorProg">
                                    <!--منتج 1-->
                                    <label>منتج 1</label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger  " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%"><span style="font-size: 19px;">عهد <bdi>80 %</bdi></span></div>
                                    </div>
                                </div>
                                <div class="col-md-12  col-sm-6 infoStorProg">
                                    <!--منتج 2-->
                                    <label>منتج 2</label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:40%"><span style="font-size: 19px;">عهد<bdi> 40 %</bdi></span></div>
                                    </div>
                                </div>
                                <div class="col-md-12  col-sm-6 infoStorProg">
                                    <!--منتج 3-->
                                    <label>منتج 3</label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:60%"><span style="font-size: 19px;">عهد <bdi>60 %</bdi></span></div>
                                    </div>
                                </div>
                                <div class="col-md-12  col-sm-6 infoStorProg">
                                    <!-- منتجات اخرى-->
                                    <label>منتجات اخرى</label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:30%"><span style="font-size: 19px;">عهد <bdi>30 %</bdi></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mygraphs-tor">
                    <div class="theinfo">
                        <div class="h2">
                            <i class="fa fa-database"></i>
                            <span>المتاح حاليا ف المخزن</span>
                        </div>
                        <div class="mycircl-grap" style="width: 90%;">

                            <canvas id="chart-area" style="max-height:260px;" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mygraphs-tor">
                    <div class="theinfo">
                        <div class="h2">
                            <div class="row">

                                <div class="col-md-3 col-sm-3 testing">
                                    <div class="myselect5 select-box">
                                        <i class="fa fa-database select-pos"></i>
                                        <select name="mystores" class="selectbox" id="">
													<option value="1">مخزن مستهلك</option>
													<option value="2">مخزن كهنه</option>
													<option value="3">مخزن خامات</option>
													<option value="4">مخزن مستديم</option>
												</select></div>
                                </div>
                                <div class="col-md-3 col-sm-4 testing">
                                    <div class="myselect6">
                                        <i class="fa fa-calendar select-pos"></i>
                                        <select name="mytimestores" class="selectbox" id="">
													<option value="1">الاسبوع الماضى</option>
													<option value="2">الاسبوع الحالى</option>
													<option value="3">الشهر الماضى</option>
													<option value="4">اليوم</option>
												</select></div>
                                </div>

                                <div class="col-md-6 col-sm-5 testing">
                                    <div class="label-forgrap">
                                        <i class="fa fa-industry"></i>
                                        <span>العمليات على االمخزونات </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="endgraphs">
                        <canvas id="chart-area2" />
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="js/myChartScript.js"></script>
<!-- ========================================================= -->
@endsection