<?php
namespace Homework\Tools;

/**
 * 陣列取值工具
 */
class GroupSplitTool
{

    public static function getGroupList(array $data_list, $row_per_group)
    {
        return array_chunk($data_list, $row_per_group);
    }

    public static function getFieldSum(
        array $data_list,
        $row_per_group,
        $field_name
    ) {
        $groups = GroupSplitTool::getGroupList($data_list, $row_per_group);
        $result = [];
        $count = 0;
        foreach ($groups as $group) {
            $result[$count] = 0;
            foreach ($group as $item) {
                $result[$count] += $item[$field_name];
            }
            $count++;
        }
        return $result;
    }
}
