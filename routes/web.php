<?php

#--------------------------------- Client Page -------------------------------------------
	Route::get('dang-nhap'                                  , 'LoginController@getDangNhap')->name('Login');
	Route::post('dang-nhap'                                 , 'LoginController@postDangNhap')->name('Login');
	Route::get('dang-xuat'                                  , 'LoginController@getDangXuat')->name('Logout');

	Route::get(''                                           , 'HomeController@getIndex')->name('Home');
	Route::get('lich-su'                                    , 'HomeController@getLichSu');
	Route::get('lich-thi-dau'                               , 'HomeController@getLichThiDau');
	Route::get('ket-qua'                                    , 'HomeController@getKetQua');
	Route::get('bang-xep-hang'                              , 'HomeController@getBangXepHang');
	Route::get('danh-sach-cau-thu'                          , 'HomeController@getCauThu');
	Route::get('danh-sach-cau-thu/chi-tiet/{idCauThu}'      , 'HomeController@getChiTietCauThu');
	Route::get('thong-ke-doi-bong'                          , 'HomeController@getThongKeDoiBong');
	Route::get('lien-he'                                    , 'HomeController@getLienHe');
	Route::post('lien-he'                                   , 'HomeController@postLienHe');
	Route::get('tin-tuc'                                    , 'HomeController@getTinTuc');
	Route::get('tin-tuc/chi-tiet/{id}'                      , 'HomeController@getChiTietTinTuc');

	Route::get('tim-kiem'                                   , 'HomeController@getTimKiem');



#-------------------------------------------- Cau Thu Page ----------------------------------------
Route::group(['prefix'                                =>'cau-thu', 'middleware'=>'loginCauThu'], function(){
	Route::group(['prefix'                                =>'{TenCauThu}'], function(){
		Route::get(''                                     , 'CauThuController@getCauThu')->name('CauThu');
		Route::get('thong-tin-ca-nhan'                    , 'CauThuController@getThongTinCaNhan');
		Route::get('thong-tin-ca-nhan/sua'                , 'CauThuController@getSuaThongTinCaNhan');
		Route::post('thong-tin-ca-nhan/sua'               , 'CauThuController@postSuaThongTinCaNhan');
		Route::get('lich-luyen-tap'                       , 'CauThuController@getLichLuyenTap');
		Route::get('doi-hinh-chien-thuat'                 , 'CauThuController@getDoiHinhChienThuat');
		Route::get('suc-khoe'                             , 'CauThuController@getSucKhoe');
		Route::get('thong-bao'                            , 'CauThuController@getThongBao');
		Route::get('lich-thi-dau'                         , 'CauThuController@getLichThiDau');
		Route::get('ket-qua'                              , 'CauThuController@getKetQua');
	});
});



#----------------------------------- Huan Luyen Vien Page ----------------------------------------------
Route::group(['prefix'                                =>'huan-luyen-vien', 'middleware'=>'loginHuanLuyenVien'], function(){
	
		
		Route::get(''                                            , 'HuanLuyenVienController@getHuanLuyenVien')->name('HuanLuyenVien');

		Route::get('thong-tin-ca-nhan'                           , 'HuanLuyenVienController@getThongTinCaNhan');
		Route::get('thong-tin-ca-nhan/sua'                       , 'HuanLuyenVienController@getSuaThongTinCaNhan');
		Route::post('thong-tin-ca-nhan/sua'                      , 'HuanLuyenVienController@postSuaThongTinCaNhan');

		Route::get('lich-luyen-tap'                              , 'HuanLuyenVienController@getLichLuyenTap');
		Route::get('lich-luyen-tap/them-lich-tap'                , 'HuanLuyenVienController@getThemLichTap');
		Route::post('lich-luyen-tap/them-lich-tap'               , 'HuanLuyenVienController@postThemLichTap');
		Route::get('lich-luyen-tap/xoa-lich-tap/{idLichTap}'     , 'HuanLuyenVienController@getXoaLichTap');
		Route::get('lich-luyen-tap/sua-lich-tap/{idLichTap}'     , 'HuanLuyenVienController@getSuaLichTap');
		Route::post('lich-luyen-tap/sua-lich-tap/{idLichTap}'    , 'HuanLuyenVienController@postSuaLichTap');

		Route::get('lich-luyen-tap/them-cau-thu-tap'            		  , 'HuanLuyenVienController@getThemCauThuTap');	
		Route::post('lich-luyen-tap/them-cau-thu-tap'            	      , 'HuanLuyenVienController@postThemCauThuTap');
		Route::get('lich-luyen-tap/xoa-cau-thu-tap/{idCauThu}/{idNgay}'   , 'HuanLuyenVienController@getXoaCauThuTap');
		Route::get('lich-luyen-tap/sua-cau-thu-tap/{idCauThu}/{idNgay}'   , 'HuanLuyenVienController@getSuaCauThuTap');
		Route::post('lich-luyen-tap/sua-cau-thu-tap/{idCauThu}/{idNgay}'  , 'HuanLuyenVienController@postSuaCauThuTap');	


		Route::get('luyen-tap/danh-sach'                      , 'HuanLuyenVienController@getDanhSachLuyenTapDanhGia');
		Route::get('luyen-tap/danh-gia/{idCauThu}/{idNgay}'   , 'HuanLuyenVienController@getDanhGia');
		Route::post('luyen-tap/danh-gia/{idCauThu}/{idLich}'  , 'HuanLuyenVienController@postDanhGia');



		Route::get('giao-trinh-tap'                              , 'HuanLuyenVienController@getGiaoTrinhTap');
		Route::get('giao-trinh-tap/them'                         , 'HuanLuyenVienController@getThemGiaoTrinhTap');
		Route::post('giao-trinh-tap/them'                        , 'HuanLuyenVienController@postThemGiaoTrinhTap');
		Route::get('giao-trinh-tap/xoa/{idGiaoTrinh}'            , 'HuanLuyenVienController@getXoaGiaoTrinhTap');
		Route::get('giao-trinh-tap/sua/{idGiaoTrinh}'            , 'HuanLuyenVienController@getSuaGiaoTrinhTap');
		Route::post('giao-trinh-tap/sua/{idGiaoTrinh}'           , 'HuanLuyenVienController@postSuaGiaoTrinhTap');

		Route::get('doi-hinh-chien-thuat'                        , 'HuanLuyenVienController@getDoiHinhChienThuat');
		Route::get('doi-hinh-chien-thuat/sap-xep/{idTranDau}'    , 'HuanLuyenVienController@getSapXepDoiHinhChienThuat');
		Route::post('doi-hinh-chien-thuat/sap-xep/{idTranDau}'   , 'HuanLuyenVienController@postSapXepDoiHinhChienThuat');
		Route::get('doi-hinh-chien-thuat/ajax/sap-xep/{idDoiHinh}/{idTranDau}', 'AjaxController@getAjaxSapXepDoiHinhChienThuat');
		Route::get('doi-hinh-chien-thuat/sua/{idTranDau}'        , 'HuanLuyenVienController@getSuaDoiHinhChienThuat');
		Route::post('doi-hinh-chien-thuat/sua/{idTranDau}'       , 'HuanLuyenVienController@postSuaDoiHinhChienThuat');
		Route::get('doi-hinh-chien-thuat/ajax/sua/{idDoiHinh}/{idTranDau}', 'AjaxController@getAjaxSuaDoiHinhChienThuat');
		Route::get('doi-hinh-chien-thuat/xem/{idTranDau}'        , 'HuanLuyenVienController@getXemDoiHinhChienThuat');

		Route::get('doi-hinh'                                    , 'HuanLuyenVienController@getDoiHinh');
		Route::get('doi-hinh/them'                               , 'HuanLuyenVienController@getThemDoiHinh');
		Route::post('doi-hinh/them'                              , 'HuanLuyenVienController@postThemDoiHinh');
		Route::get('doi-hinh/xoa/{idDoiHinh}'                    , 'HuanLuyenVienController@getXoaDoiHinh');
		Route::get('doi-hinh/sua/{idDoiHinh}'                    , 'HuanLuyenVienController@getSuaDoiHinh');
		Route::post('doi-hinh/sua/{idDoiHinh}'                   , 'HuanLuyenVienController@postSuaDoiHinh');

		Route::get('chien-thuat'                                 , 'HuanLuyenVienController@getChienThuat');
		Route::get('chien-thuat/them'                            , 'HuanLuyenVienController@getThemChienThuat');
		Route::post('chien-thuat/them'                           , 'HuanLuyenVienController@postThemChienThuat');
		Route::get('chien-thuat/xoa/{idChienThuat}'              , 'HuanLuyenVienController@getXoaChienThuat');
		Route::get('chien-thuat/sua/{idChienThuat}'              , 'HuanLuyenVienController@getSuaChienThuat');
		Route::post('chien-thuat/sua/{idChienThuat}'             , 'HuanLuyenVienController@postSuaChienThuat');

		Route::get('suc-khoe-cau-thu'                            , 'HuanLuyenVienController@getSucKhoeCauThu');

		Route::get('vai-tro-cau-thu'                             , 'HuanLuyenVienController@getVaiTroCauThu');
		Route::post('vai-tro-cau-thu/dieu-chinh'                 , 'HuanLuyenVienController@postDieuChinhVaiTroCauThu');

		Route::get('vi-tri-cau-thu'                              , 'HuanLuyenVienController@getViTriCauThu');
		Route::get('vi-tri-cau-thu/dieu-chinh/{idCauThu}'        , 'HuanLuyenVienController@getDieuChinhViTriCauThu');
		Route::post('vi-tri-cau-thu/dieu-chinh/{idCauThu}'       , 'HuanLuyenVienController@postDieuChinhViTriCauThu');

		Route::get('ky-nang-cau-thu'                             , 'HuanLuyenVienController@getKyNangCauThu');
		Route::get('ky-nang-cau-thu/dieu-chinh/{idCauThu}'       , 'HuanLuyenVienController@getDieuChinhKyNangCauThu');
		Route::post('ky-nang-cau-thu/dieu-chinh/{idCauThu}'      , 'HuanLuyenVienController@postDieuChinhKyNangCauThu');

		Route::get('ky-nang-cau-thu'                             , 'HuanLuyenVienController@getKyNangCauThu');
		
		Route::get('thong-bao'                                   , 'HuanLuyenVienController@getThongBao');
		Route::get('thong-bao/them'                              , 'HuanLuyenVienController@getThemThongBao');
		Route::post('thong-bao/them'                             , 'HuanLuyenVienController@postThemThongBao');
		Route::get('thong-bao/xoa/{idThongBao}'                  , 'HuanLuyenVienController@getXoaThongBao');
		Route::get('thong-bao/sua/{idThongBao}'                  , 'HuanLuyenVienController@getSuaThongBao');
		Route::post('thong-bao/sua/{idThongBao}'        	     , 'HuanLuyenVienController@postSuaThongBao');
		Route::get('lich-thi-dau'                                , 'HuanLuyenVienController@getLichThiDau');
		Route::get('ket-qua'                                     , 'HuanLuyenVienController@getKetQua');
	
});



#----------------------------- Admin Page ---------------------------------
Route::group(['prefix'=>'admin', 'middleware'=>'loginAdmin'],function(){
	Route::get('', 'AdminController@getIndex')->name('TrangChu_Admin');

	Route::get('cap-nhat-thong-tin', 'NguoiDungController@getCapNhatAdmin')->name('CapNhatThongTinAdmin');
	Route::post('cap-nhat-thong-tin', 'NguoiDungController@postCapNhatAdmin');

	Route::group(['prefix'=>'bang-xep-hang'],function(){
		Route::get('danh-sach'		, 	'BangXepHangCLBController@getDanhSach')	->name('DanhSachBangXepHangCLB');
		Route::get('them'			, 	'BangXepHangCLBController@getThem')		->name('ThemBangXepHangCLB');
	 	Route::post('them'			, 	'BangXepHangCLBController@postThem');
	 	Route::get('xoa/{id}'		, 	'BangXepHangCLBController@getXoa');	
		Route::get('sua/{id}'		, 	'BangXepHangCLBController@getSua')		->name('SuaBangXepHangCLB');
	 	Route::post('sua/{id}'		, 	'BangXepHangCLBController@postSua');
	});

	Route::group(['prefix'=>'giai-dau'],function(){
		Route::get('danh-sach'		, 	'GiaiDauController@getDanhSach')	->name('DanhSachGiaiDau');
		Route::get('them'			, 	'GiaiDauController@getThem')		->name('ThemGiaiDau');
	 	Route::post('them'			, 	'GiaiDauController@postThem');
	 	Route::get('xoa/{id}'		,	'GiaiDauController@getXoa');
		Route::get('sua/{id}'		, 	'GiaiDauController@getSua')			->name('SuaGiaiDau');
	 	Route::post('sua/{id}'		, 	'GiaiDauController@postSua');









	 	Route::get('them-clb-giai-dau/{idGiaiDau}'	, 	'GiaiDauController@getThem_CauLacBo_GiaiDau');
	 	Route::post('them-clb-giai-dau/{idGiaiDau}'	, 	'GiaiDauController@postThem_CauLacBo_GiaiDau');










	});

	Route::group(['prefix'=>'lich-thi-dau'], function(){
		Route::get('danh-sach'					, 	'LichThiDauController@getDanhSach')		->name('DanhSachLichThiDau');
		Route::get('them'						, 	'LichThiDauController@getThem')			->name('ThemLichThiDau');
     	Route::post('them'						, 	'LichThiDauController@postThem');

     	Route::get('xoa/{id}'					,	'LichThiDauController@getXoa');

		Route::get('sua/{id}'					, 	'LichThiDauController@getSua')			->name('SuaLichThiDau');
     	Route::post('sua/{id}'					, 	'LichThiDauController@postSua');
     	Route::get('cap-nhat-ti-so/{id}'		, 	'LichThiDauController@getCapNhatTiSo')			->name('CapNhatTiSo');
     	Route::post('cap-nhat-ti-so/{idTiSoA}/{idTiSoB}'		, 	'LichThiDauController@postCapNhatTiSo');

     	Route::get('danh-sach-liverpool'		, 	'LichThiDauController@getDanhSachLiverpool')		->name('DanhSachLiverpool');

     	Route::get('them-thanh-tich/{id}'		, 	'LichThiDauController@getThemThanhTich')			->name('ThemThanhTich');
     	Route::post('them-thanh-tich/{id}'		, 	'LichThiDauController@postThemThanhTich');
     	
     	Route::get('cap-nhat-thanh-tich/{id}'	, 	'LichThiDauController@getCapNhatThanhTich')			->name('CapNhatThanhTich');
     	Route::post('cap-nhat-thanh-tich/{id}'	, 	'LichThiDauController@postCapNhatThanhTich');

	});

	Route::group(['prefix'=>'nguoi-dung'], function(){
		Route::get('danh-sach'		, 	'NguoiDungController@getDanhSach')		->name('DanhSachNguoiDung');
		Route::get('them'			, 	'NguoiDungController@getThem')			->name('ThemNguoiDung');
     	Route::post('them'			, 	'NguoiDungController@postThem');
     	Route::get('xoa/{id}'		,	'NguoiDungController@getXoa');
		Route::get('sua/{id}'		, 	'NguoiDungController@getSua')			->name('SuaNguoiDung');
     	Route::post('sua/{id}'		, 	'NguoiDungController@postSua');
	});

	Route::group(['prefix'=>'tin-tuc'], function(){
		Route::get('danh-sach'		, 	'TinTucController@getDanhSach')			->name('DanhSachTinTuc');
		Route::get('them'			, 	'TinTucController@getThem')				->name('ThemTinTuc');
     	Route::post('them'			, 	'TinTucController@postThem');
     	Route::get('xoa/{id}'		,	'TinTucController@getXoa');
		Route::get('sua/{id}'		, 	'TinTucController@getSua')				->name('SuaTinTuc');
     	Route::post('sua/{id}'		, 	'TinTucController@postSua');
	});

	Route::group(['prefix'=>'cau-lac-bo'], function(){
		Route::get('danh-sach'		, 	'CauLacBoController@getDanhSach')		->name('DanhSachCauLacBo');
		Route::get('them'			, 	'CauLacBoController@getThem')			->name('ThemCauLacBo');
     	Route::post('them'			, 	'CauLacBoController@postThem');
     	Route::get('xoa/{id}'		,	'CauLacBoController@getXoa');
		Route::get('sua/{id}'		, 	'CauLacBoController@getSua')			->name('SuaCauLacBo');
     	Route::post('sua/{id}'		, 	'CauLacBoController@postSua');
	});

	Route::group(['prefix'=>'cau-thu'], function(){
		Route::get('danh-sach'		, 	'CauThuAdminController@getDanhSach')	->name('DanhSachCauThu');
		Route::get('them'			, 	'CauThuAdminController@getThem')		->name('ThemCauThu');
     	Route::post('them'			, 	'CauThuAdminController@postThem');
     	Route::get('xoa/{id}'		,	'CauThuAdminController@getXoa');
		Route::get('sua/{id}'		, 	'CauThuAdminController@getSua')			->name('SuaCauThu');
     	Route::post('sua/{id}'		, 	'CauThuAdminController@postSua');
	});
	
	Route::group(['prefix'=>'vi-tri'], function(){
		Route::get('danh-sach'		, 	'ViTriController@getDanhSach')		->name('DanhSachViTri');
		Route::get('them'			, 	'ViTriController@getThem')			->name('ThemViTri');
     	Route::post('them'			, 	'ViTriController@postThem');
     	Route::get('xoa/{id}'		,	'ViTriController@getXoa');
		Route::get('sua/{id}'		, 	'ViTriController@getSua')			->name('SuaViTri');
     	Route::post('sua/{id}'		, 	'ViTriController@postSua');
	});

	Route::group(['prefix'=>'vai-tro'], function(){
		Route::get('danh-sach'		, 	'VaiTroController@getDanhSach')		->name('DanhSachVaiTro');
		Route::get('them'			, 	'VaiTroController@getThem')			->name('ThemVaiTro');
     	Route::post('them'			, 	'VaiTroController@postThem');
     	Route::get('xoa/{id}'		,	'VaiTroController@getXoa');
		Route::get('sua/{id}'		, 	'VaiTroController@getSua')			->name('SuaVaiTro');
     	Route::post('sua/{id}'		, 	'VaiTroController@postSua');
	});

	Route::group(['prefix'=>'phong-do'], function(){
		Route::get('danh-sach'		, 	'PhongDoController@getDanhSach')		->name('DanhSachPhongDo');
		Route::get('them'			, 	'PhongDoController@getThem')			->name('ThemPhongDo');
     	Route::post('them'			, 	'PhongDoController@postThem');
     	Route::get('xoa/{id}'		,	'PhongDoController@getXoa');
		Route::get('sua/{id}'		, 	'PhongDoController@getSua')			->name('SuaPhongDo');
     	Route::post('sua/{id}'		, 	'PhongDoController@postSua');
	});

	Route::group(['prefix'=>'ky-nang'], function(){
		Route::get('danh-sach'		, 	'KyNangController@getDanhSach')		->name('DanhSachKyNang');
		Route::get('them'			, 	'KyNangController@getThem')			->name('ThemKyNang');
     	Route::post('them'			, 	'KyNangController@postThem');
     	Route::get('xoa/{id}'		,	'KyNangController@getXoa');
		Route::get('sua/{id}'		, 	'KyNangController@getSua')			->name('SuaKyNang');
     	Route::post('sua/{id}'		, 	'KyNangController@postSua');
	});

});



#--------------------------- Nhân viên y tế Page -----------------------------------
Route::group(['prefix'=>'nhan-vien-y-te', 'middleware'=>'loginNhanVienYTe'],function(){

	Route::get('', 'NhanVienYTeController@getIndex' )->name('TrangChu_NhanVienYTe');
	Route::get('cap-nhat-thong-tin', 'NguoiDungController@getCapNhatNhanVienYTe')->name('CapNhatThongTinNhanVienYTe');
	Route::post('cap-nhat-thong-tin', 'NguoiDungController@postCapNhatNhanVienYTe');

	Route::group(['prefix'=>'chan-thuong'], function(){
		Route::get('danh-sach'		, 	'ChanThuongController@getDanhSach')		->name('DanhSachChanThuong');
		Route::get('them'			, 	'ChanThuongController@getThem')			->name('ThemChanThuong');
     	Route::post('them'			, 	'ChanThuongController@postThem');
     	Route::get('xoa/{id}'		, 	'ChanThuongController@getXoa');
		Route::get('sua/{id}'		, 	'ChanThuongController@getSua')			->name('SuaChanThuong');
     	Route::post('sua/{id}'		, 	'ChanThuongController@postSua');
	});

	Route::group(['prefix'=>'thuoc'], function(){
		Route::get('danh-sach'		, 	'ThuocController@getDanhSach')		->name('DanhSachThuoc');
		Route::get('them'			, 	'ThuocController@getThem')			->name('ThemThuoc');
     	Route::post('them'			, 	'ThuocController@postThem');
     	Route::get('xoa/{id}'		, 	'ThuocController@getXoa');
		Route::get('sua/{id}'		, 	'ThuocController@getSua')			->name('SuaThuoc');
     	Route::post('sua/{id}'		, 	'ThuocController@postSua');
	});

	Route::group(['prefix'=>'phac-do-dieu-tri'], function(){
		Route::get('danh-sach'		, 	'PhacDoDieuTriController@getDanhSach')		->name('DanhSachPhacDoDieuTri');
		Route::get('them'			, 	'PhacDoDieuTriController@getThem')			->name('ThemPhacDoDieuTri');
     	Route::post('them'			, 	'PhacDoDieuTriController@postThem');
     	Route::get('xoa/{id}'		, 	'PhacDoDieuTriController@getXoa');
		Route::get('sua/{id}'		, 	'PhacDoDieuTriController@getSua')			->name('SuaPhacDoDieuTri');
     	Route::post('sua/{id}'		, 	'PhacDoDieuTriController@postSua');
	});

	Route::group(['prefix'=>'lich-kham'], function(){
		Route::get('danh-sach-cau-thu-chan-thuong'		, 	'LichKhamController@getDanhSachCauThuChanThuong')->name('DanhSachCauThuChanThuong');
		Route::get('danh-sach-cau-thu'		, 	'LichKhamController@getDanhSachCauThu')		->name('DanhSachCauThu');
		Route::get('danh-sach-lich-kham'	, 	'LichKhamController@getDanhSachLichKham')		->name('DanhSachLichKham');
		Route::get('them/{id}'		, 	'LichKhamController@getThem')			->name('ThemLichKham');
     	Route::post('them/{id}'		, 	'LichKhamController@postThem');
     	Route::get('xoa/{id}'		, 	'LichKhamController@getXoa');
		Route::get('sua/{id}'		, 	'LichKhamController@getSua')			->name('SuaLichKham');
     	Route::post('sua/{id}'		, 	'LichKhamController@postSua');
	});

	Route::group(['prefix'=>'toa-thuoc'], function(){
		Route::get('danh-sach'		, 	'ToaThuocController@getDanhSach')		->name('DanhSachToaThuoc');
		Route::get('them'			, 	'ToaThuocController@getThem')				->name('ThemToaThuoc');
     	Route::post('them'			, 	'ToaThuocController@postThem');
     	Route::get('xoa/{id}'		, 	'ToaThuocController@getXoa');
		Route::get('sua/{id}'		, 	'ToaThuocController@getSua')			->name('SuaToaThuoc');
     	Route::post('sua/{id}'		, 	'ToaThuocController@postSua');
	});

	Route::get('nguoidung', 'AdminController@getNguoiDung');
});