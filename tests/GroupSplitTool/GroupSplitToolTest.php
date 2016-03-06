<?php

class GroupSplitToolTest extends PHPUnit_Framework_TestCase
{

    /**
     * 分頁取值工具
     * 測試以三筆為一分頁，分頁後，取個分頁的 Cost 總和
     * @group GroupSplitTool
     */
    public function test_GroupSplitTool_3筆為一組_取Cost總和()
    {
        /** Arrange */
        $sample_data = [
            ['Id' => 1 , 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21],
            ['Id' => 2 , 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22],
            ['Id' => 3 , 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23],
            ['Id' => 4 , 'Cost' => 4, 'Revenue' => 14, 'SellPrice' => 24],
            ['Id' => 5 , 'Cost' => 5, 'Revenue' => 15, 'SellPrice' => 25],
            ['Id' => 6 , 'Cost' => 6, 'Revenue' => 16, 'SellPrice' => 26],
            ['Id' => 7 , 'Cost' => 7, 'Revenue' => 17, 'SellPrice' => 27],
            ['Id' => 8 , 'Cost' => 8, 'Revenue' => 18, 'SellPrice' => 28],
            ['Id' => 9 , 'Cost' => 9, 'Revenue' => 19, 'SellPrice' => 29],
            ['Id' => 10, 'Cost' => 1, 'Revenue' => 20, 'SellPrice' => 30],
            ['Id' => 11, 'Cost' => 1, 'Revenue' => 21, 'SellPrice' => 31],
        ];

        $row_per_group = 3;
        $field_name = 'Cost';

        $target = new GroupSplitTool($sample_data, $row_per_group);

        $expected = [6, 15, 24, 21];

        /** Act */
        $actual = $target->getFieldSum($field_name);

        /** Assert */
        $this->assertArraySubset($expected, $actual);
    }

    /**
     * 分頁取值工具
     * 測試以四筆為一分頁，分頁後，取 Revenue 總和
     * @group GroupSplitTool
     */
    public function test_GroupSplitTool_4筆為一組_取各組Revenue總和()
    {
        /** Arrange */
        $sample_data = [
            ['Id' => 1 , 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21],
            ['Id' => 2 , 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22],
            ['Id' => 3 , 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23],
            ['Id' => 4 , 'Cost' => 4, 'Revenue' => 14, 'SellPrice' => 24],
            ['Id' => 5 , 'Cost' => 5, 'Revenue' => 15, 'SellPrice' => 25],
            ['Id' => 6 , 'Cost' => 6, 'Revenue' => 16, 'SellPrice' => 26],
            ['Id' => 7 , 'Cost' => 7, 'Revenue' => 17, 'SellPrice' => 27],
            ['Id' => 8 , 'Cost' => 8, 'Revenue' => 18, 'SellPrice' => 28],
            ['Id' => 9 , 'Cost' => 9, 'Revenue' => 19, 'SellPrice' => 29],
            ['Id' => 10, 'Cost' => 1, 'Revenue' => 20, 'SellPrice' => 30],
            ['Id' => 11, 'Cost' => 1, 'Revenue' => 21, 'SellPrice' => 31],
        ];
        $row_per_group = 4;
        $field_name = 'Revenue';

        $target = new GroupSplitTool($sample_data, $row_per_group);

        $expected = [50, 66, 60];

        /** Act */
        $actual = $target->getFieldSum($field_name);

        /** Assert */
        $this->assertArraySubset($expected, $actual);

    }
}
