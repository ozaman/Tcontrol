<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_model extends CI_Model {

	public function add_region_company(){
		$data[i_shop] = $_POST[i_shop];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_COMPANY, $data);
		$last_id = mysql_insert_id();

		$data2[i_shop_country] = $last_id;
		$data2[i_country] = $_POST[id];
		$data2[s_country_code] = $_POST[country_code];
		$data2[s_topic_en] = $_POST[name_en];
		$data2[s_topic_th] = $_POST[name_th];
		$data2[s_topic_cn] = $_POST[name_cn];
		$result2 = $this->db->insert(TBL_SHOP_COUNTRY_ICON_COMPANY, $data2);
		return $result2;
	}
	public function add_region_sub_company(){
		$data[i_shop_country] = $_POST[id_shop_country];
		$data[i_country] = $_POST[id];
		$data[s_country_code] = $_POST[country_code];
		$data[s_topic_en] = $_POST[name_en];
		$data[s_topic_th] = $_POST[name_th];
		$data[s_topic_cn] = $_POST[name_cn];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_ICON_COMPANY, $data);

		return $result;
	}
	public function add_plan_price_company(){
		$data[i_shop_country] = $_POST[i_shop_country];
		$data[i_plan_price] = $_POST[i_plan_price];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_COMPANY, $data);
		$last_id = mysql_insert_id();
		$data2[i_shop_country_com] = $last_id;
		$data2[i_shop_country_icon] = $_POST[i_plan_price];
		$data2[s_topic_en] = $_POST[topic_en];
		$data2[s_topic_th] = $_POST[topic_th];
		$data2[s_topic_cn] = $_POST[topic_cn];
		$result2 = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_COMPANY, $data2);
		return $result;
	}

	public function add_plan_price_sub_company(){
		$data[i_shop_country_com] = $_POST[i_shop_country_com];
		$data[i_shop_country_icon] = $_POST[i_plan_price];
		$data[s_topic_en] = $_POST[topic_en];
		$data[s_topic_th] = $_POST[topic_th];
		$data[s_topic_cn] = $_POST[topic_cn];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_COMPANY, $data);
		return $result;
	}
	public function save_plan_price(){
		$_where = array();
		$_where['i_plan_price'] = $_POST[i_price_plan];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
		$plan[i_shop_country_icon] = $_POST[i_country_icon_plan];
		$plan[i_plan_price] = $_POST[i_price_plan];


		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_COMPANY, $plan);
		$last_id = mysql_insert_id();

		foreach ($data['plan_com'] as $val) {
			$data = array();
			$data[i_shop_country_com_list] = $last_id;
			$data[i_shop_country_icon] = $_POST[i_country_icon_plan];
			$data[i_plan_price] = $_POST[i_price_plan];	
			$data[s_topic_th] = $val->s_topic_th;
			$data[i_price] = $_POST[$val->element];
			$data[s_payment] = $_POST[money_.$val->element];
			$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY, $data);

		}
		return $result;
	}

	public function save_edit_com_company(){
		$_where = array();
		$_where['i_shop_country_com_list'] = $_GET[i_shop_country_com_list];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$arr['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY,$_where,$_select,$_order);
		foreach ($arr['plan_com'] as $val) {
			$this->db->where('id', $val->id);
			$data[i_price] = $_POST[input_.$_GET[i_shop_country_com_list]._.$val->id];
			$result = $this->db->update(TBL_SHOP_COUNTRY_COM_LIST_PRICE_COMPANY, $data);

		}
		return $result;
	}



/********* END COMPANY MODEL **********/




}