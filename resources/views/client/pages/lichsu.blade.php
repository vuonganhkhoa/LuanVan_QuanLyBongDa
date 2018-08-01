@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Lịch sử đội bóng')

@section ('content')

<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Lịch sử đội bóng</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Lịch sử</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				
				<!--// KODE CLUB WRAPER SRTART //-->
				<div class="kode_club_wraper">
					<div class="container">
						<div class="kode_club_hdg">
							<h2>Câu lạc bộ bóng đá <span>Liverpool</span></h2>
						</div>
						<div class="row">
							<div class="col-md-6">
								
                             	<div class="kode_club_training">

                             		<div class="kode_club_fig">
									<figure>
										<img src="Client/images/logos/Liverpool_Home.png" alt="" height="200">
	
									</figure>
									</div> 
									
									<p>{!! $CauLacBo->LichSu !!}</p>
									<ul>
										<li><a href="#"><b>Năm thành lập: </b>	{{ date('Y', strtotime($CauLacBo->NamThanhLap)) }}  </a></li>
										<li><a href="#"><b>Biệt danh: </b>	{{ $CauLacBo->BietDanh }} </a></li>
										<li><a href="#"><b>Sân vận động: </b>{{ $CauLacBo->SanVanDong }}</a></li>
										<li><a href="#"><b>Sức chứa: </b>	{{ $CauLacBo->SucChua }}</a></li>
										<li><a href="#"><b>Chủ sở hữu</b>	{{ $CauLacBo->TruSo }}</a></li>
										<li><a href="#"><b>Chủ tịch: </b>	{{ $CauLacBo->ChuTich }} </a></li>
									</ul><br>

								</div>
							</div>
							<div class="col-md-6">
								<div class="kode_club_training">
											<p>Liverpool được thành lập vào năm <span class="colorRed">1892</span> và lên chơi ở giải cấp quốc gia trong năm kế tiếp. Đội đã sử dụng sân nhà Anfield từ khi thành lập cho đến nay. Đội thi đấu rất thành công trong thập niên 70 và 80, dưới thời các huấn luyện viên Bill Shankly và Bob Paisley, họ đã giành được 11 chức vô địch quốc gia cùng 7 danh hiệu châu Âu.</p>

											<p>Liverpool có lượng cổ động viên hùng hậu và rất trung thành. Những kình địch lâu đời của họ là đội bóng hàng xóm Everton và đội Manchester United. Bài hát truyền thống của đội là "You'll Never Walk Alone" (tạm dịch: "Bạn sẽ không bao giờ bước đi đơn độc"). Cầu thủ Liverpool lần đầu mặc trang phục thi đấu toàn bộ đỏ vào năm <span class="colorRed">1964</span>, khi huấn luyện viên Bill Shankly cho rằng màu đỏ sẽ gây tác động đến tâm lý đối phương.

											<p>Đội bóng có mặt trong hai sự kiện đáng buồn của bóng đá châu Âu. Đầu tiên là thảm họa tại sân Heysel vào năm 1985, nhiều cổ động viên Liverpool quá khích đã tấn công cổ động viên Juventus khiến một bức tường khán đài sập xuống, gây ra cái chết của 39 người. Năm 1989, đến lượt thảm họa thứ hai là Hillsborough khi 96 cổ động viên Liverpool đã thiệt mạng do bị xô đẩy dồn ép vào dải rào ngăn cách giữa khán đài và sân cỏ.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--// KODE CLUB WRAPER END//-->
				
				<!--// KODE ABOUT MISSION START//-->
				<div class="kode_about_mision">
					<div class="kode_about_mission_text">
					</div>
					<div class="kode_about_mission_text text_2">
					</div>
				</div>
				<!--// KODE ABOUT MISSION END//-->
				
				<!--// KODE ABOUT HISTORY START //-->
				<div class="kode_about_history">
					<div class="container">
						<div class="heading5 black margin">
						  <h4>Lịch sử <span>Câu lạc bộ</span></h4>
						</div>
						<div class="row">
							<div class="col-md-4">
								<ul id="bx-pager-one" class="kode_history_winner">
									<a class="active" data-slide-index="0" href="#ThanhLap">
										<li>
											<span>1892</span>
											<p>Liverpool được thành lập</p>
										</li>
									</a>
									<a data-slide-index="1" href="#DanhHieuQuocGiaDauTien">									
										<li>
											<span>1901</span>
											<p>Danh hiệu quốc gia đầu tiên</p>
										</li>
									</a>
									<a data-slide-index="2" href="#BillShankly" >
										<li>
											<span>1959</span>
											<p>Bill Shankly được bổ nhiệm</p>
										</li>
									</a>
									<a data-slide-index="3" href="#DongPhuc">
										<li>
											<span>1964</span>
											<p>Đổi sang đồng phục toàn đỏ</p>
										</li>
									</a>
									<a data-slide-index="4" href="#UEFA">
										<li>
											<span>1973</span>
											<p>Danh hiệu châu âu (UEFA) đầu tiên</p>
										</li>
									</a>
									<a data-slide-index="5" href="#C1">
										<li>
											<span>1977</span>
											<p>Danh hiệu châu âu (C1) đầu tiên</p>
										</li>
									</a>
									<a data-slide-index="6" href="#BobPaisley">
										<li>
											<span>1983</span>
											<p>HLV huyền thoại Bob Paisley về hưu</p>
										</li>
									</a>
									<a data-slide-index="7" href="#Dalglish">
										<li>
											<span>1989</span>
											<p>K.Dalglish chơi trận đấu cuối cùng</p>
										</li>
									</a>
									<a data-slide-index="8" href="#CupQuocGiaLan18">
										<li>
											<span>1990</span>
											<p>Danh hiệu quốc gia lần thứ 18</p>
										</li>
									</a>
									<a data-slide-index="9" href="C1Lan5">
										<li>
											<span>2005</span>
											<p>Danh hiệu châu âu (C1) lần thứ 5</p>
										</li>
									</a>
								</ul>
							</div>
							<div class="col-md-8">
								<ul class="bxslider_pager bx-pager-one">

									<li id="ThanhLap">
										<div class="kode_history_text">
											<p>Liverpool là một trong những câu lạc bộ bóng đá lâu đời nhất ở nước Anh, nhưng điều đáng ngạc nhiên là sự hình thành của họ lại bắt nguồn từ chính đối thủ cùng thành phố Everton. Câu lạc bộ bóng đá Everton được thành lập vào năm 1878 và bắt đầu chơi bóng ở sân Anfield từ năm 1884.</p>

											<p>Năm 1891, John Houlding, người đứng tên hợp đồng thuê sân Anfield, cùng vài người nữa sau này sẽ là những thành viên trong ban giám đốc của Liverpool, quyết định mua đứt sân bóng đó. Giá thuê tằng từ 100 bảng Anh vào năm 1884 lên 250 bảng trong năm 1890.</p>

											<p>Các thành viên của Everton bèn rời Anfield để tới chơi ở Goodison Park. Chỉ còn lại ba cầu thủ và một sân bóng trông không, John Houlding quyết định tự thành lập cho mình một đội bóng vào ngày <span class="colorRed">15-3-1892</span> và vậy là Liverpool ra đời. John McKenna được chỉ định làm giám đốc điều hành của đội bóng mới và ông đã tới Scotland để ký hợp đồng với 13 cầu thủ chuyên nghiệp cho câu lạc bộ. Đội bóng đó được gọi là "đội bóng của những Mac", bởi tám trong số 13 cầu thủ người Scotland có tên bắt đầu bằng tiền tố "Mc".</p>

											<figure>
												<img src="client/images/history1.jpeg" alt="">
											</figure>
										</div>
									</li>

									<li id="DanhHieuQuocGiaDauTien">
										<div class="kode_history_text">
											<p>Liverpool chơi trận đầu tiên của họ với Rotherham Town và giành thắng lợi 7-1. Malcolm McVean đã ghi bàn thắng đầu tiên trong lịch sử cho đội bóng áo đỏ. Đó cũng là lần đầu tiên một câu lạc bộ Anh đưa ra sân đội hình gồm toàn những cầu thủ nước ngoài.</p>

											<p>Một nỗ lực đầy tham vọng nộp đơn gia nhập giải chuyên nghiệp Anh Football League đã bị từ chối. Liverpool đành bắt đầu với giải địa phương Lancashire League, bằng chiến thắng 8-0 tại Anfield trước đối thủ Higher Walton. Đội bóng áo đỏ kết thúc mùa giải đó với chức vô địch và đánh bại Everton 1-0 trong trận derby đầu tiên của vùng Merseyside và được thăng hạng lên chơi ở Football League cùng với Arsenal.</p>

											<p>McVean ghi bàn đầu tiên cho câu lạc bộ ở giải chuyên nghiệp trong chiến thắng 2-0 trước Middlesbrough Ironopolis. Mùa giải đó, Liverpool kết thúc với thành tích bất bại và giành chức vô địch giải hạng Hai, trong đó bao gồm một chiến thắng 2-0 trước Newton Heath (sau này được đặt tên lại là Manchester United), và giành quyền lên chơi ở giải hạng Nhất.</p>

											<p>Cùng với sự có mặt của huấn luyện viên Tom Watson, từng ba lần dẫn dắt Sunderland đến chức vô địch giải hạng Nhất, đồng phục thi đấu của Liverpool được đổi từ xanh trắng sang đỏ trắng. Năm <span class="colorRed">1901</span>, Liverpool lần đầu tiên giành chức vô địch Anh. Năm 1906, họ lặp lại thành tích đó, trong khi Everton giành cúp FA.</p>
											<figure>
												<img src="client/images/history2.jpeg" alt="">
											</figure>
										</div>
									</li>

									<li id="BillShankly">
										<div class="kode_history_text">
											<p><span class="colorRed">Bill Shankly</span> được chỉ định làm huấn luyện viên Liverpool vào <span class="colorRed">tháng 12 năm 1959</span> và trong 15 năm tiếp theo ông đã biến họ thành một trong những câu lạc bộ hàng đầu ở châu Âu. Trong năm đầu tiên, ông chấm dứt hợp đồng với 24 cầu thù thủ và giới thiệu những gương mặt mới như Ian St John, Ron Yeats, Roger Hunt, Ian Callaghan và Gerry Byrne.</p>

											<p>Vào đầu mùa giải 1961-1962, Shankly đã xây dựng được bộ khung nền tảng làm hạt nhân cho đội bóng mới của ông. Mùa giải đó, Mùa giải đó, mùa thứ ba Shankly dẫn dắt Liverpool, đội bóng áo đỏ đã giành chức vô địch giải hạng Nhì một cách thuyết phục, hơn đội thứ hai tám điểm, để trở lại với hạng Nhất.</p>

											<figure>
												<img src="client/images/history3.jpeg" alt="">
											</figure>

											<p>Năm sau đó Liverpool giành lại chức vô địch và vào tới chung kết cúp C2, nhưng để thua Borussia Dortmund 1-2. Cho tới giờ, Shankly vẫn được coi là một trong những huấn luyện viên xuất sắc nhất của cả thế giới bóng đá và đội hình Liverpool ông đã xây dựng nên gồm nhiều cầu thủ xuất sắc bậc nhất của nước Anh thời bấy giờ. Nhưng Shakly vẫn chưa hài lòng, ông tiếp tục chuẩn bị cho những hợp đồng mới và đưa về đội bóng Emlyn Hughes, Ray Clemence và Kevin Keegan từ các đội bóng hạng dưới. Ba cái tên đó sau này sẽ biến Liverpool thành đội bóng giàu thành tích nhất nước Anh.</p>

											
										</div>
									</li>

									<li id="DongPhuc">
										<div class="kode_history_text">
											<p>Năm <span class="colorRed">1964</span>, Liverpool giành chức vô địch giải hạng Nhất. Đó cũng là năm mà Liverpool đổi sang đồng phục toàn đỏ, được mặc cho tới bây giờ. Liverpool không bảo vệ được chức vô địch đó ở mùa giải sau nhưng bù lại, họ giành chiếc cúp FA lần đầu tiên trong lịch sử câu lạc bộ (đánh bại Leeds United 2-1 trong trận chung kết). Chiến dịch châu Âu đầu tiên của họ kết thúc tại vòng bán kết trước Inter Milan. Trong cuộc đọ sức vẫn còn được nhắc tới nhiều tại Merseyside, Liverpool thắng trận lượt đi 3-1 nhưng thua trận lượt về 0-3.</p>

											<figure>
												<img src="client/images/history4.jpeg" alt="">
											</figure>
											
										</div>
									</li>

									<li id="UEFA">
										<div class="kode_history_text">
											<p>Liverpool giành danh hiệu đầu tiên của họ ở châu Âu, cúp UEFA, vào năm <span class="colorRed"> 1973</span>. Cũng năm đó, họ giành thêm một chức vô địch giải hạng Nhất nữa. Trận chung kết cúp UEFA coi như đã kết thúc sau lượt đi với chiến thắng 3-0 cho Liverpool. Tuy nhiên, câu lạc bộ ĐứcBorussia Moenchengladbach đã chiến đấu rất quyết tâm trong lượt về và thắng lại 2-0.</p>

											<figure>
												<img src="client/images/history5.jpeg" alt="">
											</figure>

											<p>Năm sau đó, Liverpool còn giành thêm một cúp FA nữa bằng chiến thắng thuyết phục 3-0 trong trận chung kết trước Newcastle United. Shankly đã khiến cả thế giới bóng đá ngạc nhiên khi tuyên bố từ chức ở Liverpool và về hưu sau mùa giải đó. Các cầu thủ và những cổ động viên cố thuyết phục ông ở lại, công nhân làm ở một nhà máy địa phương thậm chí còn đe dọa biểu tình, nhưng Shankly không thay đổi quyết định của ông. Trọng trách được giao lại cho người kế nhiệm Bob Paisley.</p>
										</div>
									</li>

									<li id="C1">
										<div class="kode_history_text">
											<p>Trợ lý 55 tuổi của Shankly là <span class="colorRed">Bob Paisley</span>, được thăng lên vị trí của người quản lý sau khi không thuyết phục được người tiền nhiệm ở lại. Paisley làm quản lý của Liverpool trong giai đoạn từ năm 1974 đến năm 1983, và trong vòng chín năm ông đã trở thành một trong những nhà quản lý thành công nhất của một câu lạc bộ Anh. Chỉ có một lần duy nhất đội bóng ông dẫn dắt không giành được danh hiệu vào mùa giải đầu tiên 1974-75. Vào mùa giải thứ hai của ông thì câu lạc bộ giành chức vô địch giải Hạng Nhất đầu tiên dưới thời kỳ ông dẫn dắt.</p>
											<figure>
												<img height="300" src="client/images/history6.jpeg" alt="">
											</figure>

											<p>Năm 1977, đội bóng lại đoạt chức vô địch và là lần tiên đoạt cúp châu Âu (European Cup) trong lịch sử của đội. Trận chung kết tại Rome, đội bóng giành chiến thắng 3-1 trước kẻ thù cũ Borussia Moenchengladbach và lúc đó cũng là thời điểm cuối cùng Kevin Keegan cống hiến cho câu lạc bộ. Năm sau đó đội bóng lại giành được cúp châu Âu với chiến thắng 1-0 trước FC Bruges.</p>

											<figure>
												<img height="320" src="client/images/history8.jpeg" alt="">
											</figure>

										</div>
									</li>

									<li id="BobPaisley">
										<div class="kode_history_text">
											<p>Mùa giải 1982-83, Liverpool lại giữ được chức vô địch giải hạng Nhất và Liên Đoàn. Họ phải đối mặt với sự cạnh tranh gay gắt từ rất sớm ở giải hạng nhất, nhưng họ đã bứt phá ngoạn mục trong những trận cuối. Thời điểm lần thứ ba liên tiếp họ vô địch Liên Đoàn là vào ngày 26 tháng ba, với bàn thắng của Alan Kennedy và Ronnie Whelan cho họ một chiến thắng 2-1 trước Manchester United trong trận chung kết ở sân Wembley.</p>
											<figure>
												<img height="300" src="client/images/history9.jpeg" alt="">
											</figure>

											<p>Một câu hỏi của người hâm mộ vào cuối mùa giải là ai sẽ là người thay thế Paisley. Trước khi về hưu ông đã giành tổng cộng 21 danh hiệu, bao gồm ba cúp châu Âu, một cúp UEFA, sáu chức vô địch giải Hạng Nhất và ba lần liên tiếp vô địch Liên Đoàn. Dưới kỉ nguyên của Paisley nhiều ngôi sao đã nổi lên như Graeme Souness, Ian Rush, Alan Hansen và Kenny Dalglish.</p>

											<figure>
												<img height="340" src="client/images/history7.jpeg" alt="">
											</figure>

										</div>
									</li>

									<li id="Dalglish">
										<div class="kode_history_text">
											<p><span class="colorRed">Dalglish</span> đã dẫn dắt Liverpool tới chiến thắng trước Everton trong trận chung kết cúp FA toàn Merseyside lần thứ 2 năm 1989 nhưng họ đã phung phí mất cơ hội đoạt cú đúp lần thứ 2 trong những phút cuối cùng của trận đấu kết thúc mùa giải. Cú sút của Michael Thomas - cầu thủ tương lai là người của Liverpool đã giúp Arsenal F.C có được chiến thắng 2-0 cần thiết ngay tại Anfield và chức vô địch đã thuộc về các cầu thủ phía Bắc London do họ có thành tích ghi bàn tốt hơn, còn số điểm là ngang nhau.</p>
											<figure>
												<img height="300" src="client/images/history10.jpeg" alt="">
											</figure>

											<p>Giai đoạn 1989-90 cũng là mùa giải chứng kiến cầu thủ 38 tuổi <span class="colorRed">Dalglish</span> chơi trận đấu cuối cùng trong sự nghiệp khi ông vào sân ở phút thứ 71 thay cho Jan Mølby trong trận đấu cuối cùng trên sân nhà của mùa giải với Derby County vào ngày 01/05/1990. <span class="colorRed">Dalglish</span> cũng lần thứ 3 nhận được giải thưởng Huấn luyện viên xuất sắc nhất năm.</p>

											<figure>
												<img height="340" src="client/images/history11.jpeg" alt="">
											</figure>

										</div>
									</li>

									<li id="CupQuocGiaLan18">
										<div class="kode_history_text">
											<p> Trong mùa giải 1989-90, Liverpool lần thứ 3 giành chức vô địch giải Hạng Nhất trong 5 mùa giải đầu tiên dưới sự dẫn dắt của Dalglish. Chức vô địch đến sau sự vùng lên muộn màng của một Aston Villa từ tháng 04 nhưng một chuỗi trận mạnh mẽ trong những tuần lễ cuối cùng của mùa giải vẫn không thể ngăn đội bóng của Dalglish lên ngôi vô địch với 9 điểm cách biệt.</p>
											<figure>
												<img height="300" src="client/images/history12.jpeg" alt="">
											</figure>

											<p>Dalglish đã phụ trách câu lạc bộ trong thời điểm thảm hoạ Hillsborough vào ngày 15 tháng 04 năm 1989 trước cuộc trạm chán Nottingham Forest tại bán kết cup FA. Thảm kịch đã cướp đi 94 sinh mạng vào ngày hôm đó, cuối cùng con số lên tới 96. Dalglish đã khiến rất nhiều người khâm phục nhân cách của ông trong suốt thảm kịch này. Ông đã có mặt trong rất nhiều đám tang như ông đã từng làm cho các cầu thủ Liverpool khác. Ông vẫn được các cổ động viên Liverpool yêu mến trong mùa giải này cũng như sự nghiệp trên sân cỏ thành công của ông.</p>

										</div>
									</li>

									<li id="C1Lan5">
										<div class="kode_history_text">
											<p>Huấn luyện viên Rafael Benítez nhậm chức vào năm 2004, ông chuyển đến từ Valencia CF với các danh hiệu vô địch La liga và cúp UEFA. Liverpool kết thúc với vị trí đáng thất vọng, vị trí thứ 5 Ngoại hạng Anh trong mùa giải đầu tiên ông dẫn dắt. Tuy nhiên họ kết thúc mùa giải trong sự ngạc nhiên chung khi vô địch cúp C1 lần thứ 5 trong lịch sử câu lạc bộ. Sau khi loại đối thủ ưa thích Juventus F.C. trong trận tứ kết, họ đánh bại kình địch nước Anh Chelsea trong trận bán kết bằng 1 "bàn thắng ma" (tên được đặt bởi huấn luyện viên Chelsea José Mourinho).</p>
											<figure>
												<img height="300" src="client/images/history14.jpeg" alt="">
											</figure>

											<p>Họ đụng độ đối thủ mạnh A.C. Milan trong trận chung kết. Sau khi bị dẫn 3-0 trong hiệp 1, họ đã chơi cực kì ấn tượng, gỡ lại 3 bàn thắng trong hiệp 2 và phút bù giờ. Liverpool giành được chiến thắng sau loạt sút penalty với người hùng, thủ môn Jerzy Dudek, người đã bắt chước thủ môn huyền thoại Liverpool Bruce Grobbelaar động tác rung chân khiến cầu thủ đối phương bối rối.</p>

											<figure>
												<img height="300" src="client/images/history13.jpeg" alt="">
											</figure>

											<p>
											Mặc dù là nhà vô địch hiện tại, song họ có nguy cơ không thể bảo vệ danh hiệu. Theo luật UEFA, chỉ có 4 đội được dự cúp C1, vào mùa giải 2004-2005, 4 đội được dự cúp C1 mùa sau là: Chelsea, Arsenal, Manchester United, Everton, những đội nằm trong top 4 đội cao điểm nhất, Liverpool chỉ xếp thứ 5. Vậy nên UEFA cũng ra luật mới, cho phép đội vô địch được tham dự cúp C1 mùa sau.</p>		
										</div>
									</li>
								</ul>	
							</div>
						</div>
					</div>
				</div>
				<!--// KODE ABOUT HISTORY END //-->
				
				<!--// FOOTBALL COUNTER //-->
				<div class="ftb-counterup counter_2">
				  <div class="container">
					<!--// HEADING 5 //-->
					<div class="heading5">
					  <h2>18 lần vô địch nước Anh - 7 Cúp FA - 8 Cúp Liên đoàn - 15 Siêu cúp Anh <br><br> 5 Cúp vô địch châu Âu (Cúp C1) - 3 Cúp UEFA (Cúp C2) - 3 Siêu cúp châu Âu.</h2>
					</div>
					<!--// HEADING 5 //-->
					<div class="row">

					</div>
				  </div>
				</div>
				<!--// FOOTBALL COUNTER //-->
				
				<div class="kode_about_award">
					<div class="container">
						<div class="heading5 black margin">
						  <h4>Thành tích <span>Câu lạc bộ</span></h4>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="kode_about_awards_fig">
									<div class="kode_awards_thumb">
										<img src="Client/images/award.png" alt="">
										<a href="#"><i class="fa fa-arrows"></i></a>
										<a data-rel="prettyPhoto[]" href="Client/images/award.png"><i class="fa fa-expand"></i></a>
									</div>
									<h6 class="titile">Champions league Cup (5)</h6>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="kode_about_awards_fig">
									<div class="kode_awards_thumb">
										<img src="Client/images/award1.png" alt="">
										<a data-rel="prettyPhoto[]" href="Client/images/award1.png"><i class="fa fa-expand"></i></a>
									</div>
									
									<h6 class="titile">UEFA Cup (3)</h6>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="kode_about_awards_fig">
									<div class="kode_awards_thumb">
										<img src="Client/images/award2.png" alt="">
										<a data-rel="prettyPhoto[]" href="Client/images/award2.png"><i class="fa fa-expand"></i></a>
									</div>
									
									<h6 class="titile">Vô địch quốc gia (18)</h6>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="kode_about_awards_fig">
									<div class="kode_awards_thumb">
										<img src="Client/images/award3.png" alt="">
										<a data-rel="prettyPhoto[]" href="Client/images/award3.png"><i class="fa fa-expand"></i></a>
									</div>
									<h6 class="titile">FA Cup (7)</h6>
								</div>
							</div>
						</div>
					</div>
				</div>

@stop