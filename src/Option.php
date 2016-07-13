<?php
namespace Juhedao\SiteOptions;

use Juhedao\SiteOptions\Models\Options as Options;

class Option {

    public function getSingle($optionName) {
        return Options::single($optionName);
    }

    public function getGroup($optionGroup) {
        return Options::group($optionGroup)->toList();
    }

    public function getAutoload() {
        return Options::autoload()->toList();
    }

    public function getGroupName() {
        return Options::groupName();
    }

    public function getWhereNames($namesArr) {
        return Options::whereNames($namesArr)->toList();
    }

    public function save($option_name,$option_group,$option_value,$autoload){
        if(Options::where('option_name',$option_name)->count()>0){
            return ['result'=>false,'message'=>"配置{$option_name}创建失败，当前已存在此名称的配置，请重新选择配置名称！"];
        }else{
            $option = new Options();
            $option->option_name = $option_name;
            $option->option_group = $option_group;
            $option->option_value = $option_value;
            $option->autoload = $autoload;
            if($option->save()){
                return ['result'=>true,'message'=>"配置{$option_name}已创建功能并保存！"];
            }else{
                return ['result'=>false,'message'=>"配置{$option_name}创建失败，请检查值！"];
            }
        }
    }

    public function update($option_name,$option_group,$option_value,$autoload) {
        $option = Options::firstOrCreate(['option_name'=>$option_name]);
        $option->option_group = $option_group;
        $option->option_value = $option_value;
        $option->autoload = $autoload;
        if($option->save()){
            return ['result'=>true,'message'=>"配置{$option_name}已修改成功！"];
        }else{
            return ['result'=>false,'message'=>"配置{$option_name}修改失败，请检查值！"];
        }
    }

}