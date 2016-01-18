<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$language = array(
		'acp_main_page_title' => 'TAKA->Dashboard',
		'acp_main_master_title' => 'Dashboard',
		'acp_main_page_name' => 'Danh mục sản phẩm',
		'acp_main_page_viewlist' => 'Danh sách danh mục',
		'acp_main_page_add_product_category' => 'Tạo danh mục mới',
		'acp_main_page_edit_product_category' => 'Chỉnh sửa',
		'acp_main_object_extend_info' => 'Thông tin thêm',
		'acp_object_itemperpage' => 'Danh mục / trang',
		'acp_table_select_btn' => 'Chọn',
		'acp_table_select_btn_all' => 'Chọn tất cả',
		'acp_table_select_btn_deselect' => 'Bỏ chọn',
		'acp_table_th_id' => 'ID',
		'acp_table_th_sort_asc' => 'Tăng dần',
		'acp_table_th_sort_desc' => 'Giảm dần',
		'acp_table_th_name' => 'Tên bài viết',
		'acp_table_th_sort_az' => 'Sắp xếp: A - Z',
		'acp_table_th_sort_za' => 'Sắp xếp: Z - A',
		'acp_table_th_image' => 'Ảnh',
		'acp_table_th_category' => 'Danh mục cha',
		'acp_table_th_action' => 'Thao tác',
		'acp_table_th_status' => 'Trạng thái',
		'acp_status_noparent' => 'Không thuộc danh mục',
		'acp_table_th_action_edit' => 'Sửa',
		'acp_table_th_action_preview' => 'Xem',
		'acp_table_th_action_clone' => 'Chép',
		'acp_table_th_action_delete' => 'Xóa',
		'acp_table_th_action_deleteall' => 'Xóa tất cả mục chọn',
		'acp_table_th_status_enable' => 'Mở',
		'acp_table_th_status_disable' => 'Đóng',
		'acp_object_not_found' => 'Xin lỗi, danh mục này không có.',
		'acp_object_save' => 'Lưu',
		'acp_object_backtohome' => 'Về trang chủ',
		'acp_object_editor_name' => 'Tên danh mục',
		'acp_object_editor_niceurl' => 'Đường dẫn',
		'acp_object_editor_niceurl_real' => 'Đường dẫn thực',
		'acp_object_editor_meta_keyword' => 'Từ khóa liên quan',
		'acp_object_editor_shortdescription' => 'Mô tả ngắn',
		'acp_object_editor_content' => 'Giới thiệu danh mục',
		'acp_object_editor_image' => 'Ảnh đại diện',
		'acp_object_editor_categoryselect' => 'Danh mục cha',
	);