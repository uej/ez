<?php
namespace app\manage\model;
use ez\core\Model;

/**
 * 商户模型
 * 
 * @author lxj
 */
class Company extends Model {
    
    /**
     * @var string 表名
     */
    public static $tableName = 'common_company';
    
    
    /**
     * 添加商户
     * 
     * @access public
     */
    public function addCompany($data = []) {
        $data   = $this->create($data);
        $data['createTime'] = time();
        
        if (empty($data['name'])) {
            $this->error    = '商户名称不能为空';
            return FALSE;
        }
        if (empty($data['contact'])) {
            $this->error    = '商户联系人不能为空';
            return FALSE;
        }
        if (empty($data['phone'])) {
            $this->error    = '商户联系电话不能为空';
            return FALSE;
        }
        
    }
}
