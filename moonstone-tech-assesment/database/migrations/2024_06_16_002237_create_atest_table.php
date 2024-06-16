<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::dropIfExists('atest');

        Schema::create('atest', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 60);
            $table->integer('pef_item_id')->nullable();
            $table->integer('order_no');
            $table->timestamps();
        });

        // insert the data into the table
        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atest');
    }

    // Todo: implement the 'insertData()' function and perform migration
    private function insertData()
    {
        $data = [
            ['id' => 8653, 'name' => 'treeItems', 'pef_item_id' => 21510, 'order_no' => 15],
            ['id' => 21510, 'name' => 'centerBorder', 'pef_item_id' => 53846, 'order_no' => 25],
            ['id' => 21513, 'name' => 'tabPanelSouth', 'pef_item_id' => 53846, 'order_no' => 35],
            ['id' => 21515, 'name' => 'containerEast', 'pef_item_id' => 53846, 'order_no' => 30],
            ['id' => 21516, 'name' => 'tabItemSettings', 'pef_item_id' => 21513, 'order_no' => 40],
            ['id' => 21517, 'name' => 'tabItemActions', 'pef_item_id' => 21513, 'order_no' => 50],
            ['id' => 21518, 'name' => 'tabItemPermissions', 'pef_item_id' => 21513, 'order_no' => 60],
            ['id' => 21519, 'name' => 'tabItemTooltips', 'pef_item_id' => 21513, 'order_no' => 5],
            ['id' => 21945, 'name' => 'tabContainerSettings', 'pef_item_id' => 21513, 'order_no' => 70],
            ['id' => 21946, 'name' => 'treeComponents', 'pef_item_id' => 21510, 'order_no' => 10],
            ['id' => 21947, 'name' => 'dropdownContainer', 'pef_item_id' => 22144, 'order_no' => 1815],
            ['id' => 21955, 'name' => 'tabContainerPorts', 'pef_item_id' => 21513, 'order_no' => 85],
            ['id' => 21957, 'name' => 'tabContainerActions', 'pef_item_id' => 21513, 'order_no' => 75],
            ['id' => 21958, 'name' => 'tabContainerPermissions', 'pef_item_id' => 21513, 'order_no' => 80],
            ['id' => 21961, 'name' => 'buttonPreviewContainer', 'pef_item_id' => 22144, 'order_no' => 1820],
            ['id' => 21969, 'name' => 'containerContPorts', 'pef_item_id' => 21955, 'order_no' => 20],
            ['id' => 21970, 'name' => 'containerItemSettings', 'pef_item_id' => 21516, 'order_no' => 20],
            ['id' => 22144, 'name' => 'hboxNorth', 'pef_item_id' => 53846, 'order_no' => 15],
            ['id' => 22145, 'name' => 'dropinId', 'pef_item_id' => 22144, 'order_no' => 1835],
            ['id' => 22147, 'name' => 'buttonClearFiles', 'pef_item_id' => 22144, 'order_no' => 1830],
            ['id' => 22148, 'name' => 'cpCurrentContainer', 'pef_item_id' => 59868, 'order_no' => 20],
            ['id' => 22149, 'name' => 'clearCache', 'pef_item_id' => 53844, 'order_no' => 25],
            ['id' => 22150, 'name' => 'clearAll', 'pef_item_id' => 53844, 'order_no' => 50],
            ['id' => 22312, 'name' => 'containerTooltips', 'pef_item_id' => 21519, 'order_no' => 65],
            ['id' => 22313, 'name' => 'containerItemEvents', 'pef_item_id' => 21517, 'order_no' => 65],
            ['id' => 22314, 'name' => 'containerItemPermissions', 'pef_item_id' => 21518, 'order_no' => 65],
            ['id' => 22316, 'name' => 'containerContSettings', 'pef_item_id' => 21945, 'order_no' => 85],
            ['id' => 22317, 'name' => 'containerContActions', 'pef_item_id' => 21957, 'order_no' => 115],
            ['id' => 22318, 'name' => 'containerContPermissions', 'pef_item_id' => 21958, 'order_no' => 100],
            ['id' => 53765, 'name' => 'containerWest', 'pef_item_id' => 53846, 'order_no' => 20],
            ['id' => 53841, 'name' => 'clearCrudC', 'pef_item_id' => 22148, 'order_no' => 15],
            ['id' => 53842, 'name' => 'clearCacheC', 'pef_item_id' => 22148, 'order_no' => 20],
            ['id' => 53843, 'name' => 'clearAllC', 'pef_item_id' => 22148, 'order_no' => 35],
            ['id' => 53844, 'name' => 'apCurrentContainer', 'pef_item_id' => 59874, 'order_no' => 15],
            ['id' => 53845, 'name' => 'clearCrud', 'pef_item_id' => 53844, 'order_no' => 20],
            ['id' => 53846, 'name' => 'layoutborder', 'pef_item_id' => NULL, 'order_no' => 55],
            ['id' => 53856, 'name' => 'buttonApplyDropin', 'pef_item_id' => 22144, 'order_no' => 1840],
            ['id' => 59868, 'name' => 'currentPermgroup', 'pef_item_id' => 22147, 'order_no' => 55],
            ['id' => 59869, 'name' => 'cpAllContainers', 'pef_item_id' => 59868, 'order_no' => 25],
            ['id' => 59870, 'name' => 'crudFiles', 'pef_item_id' => 59869, 'order_no' => 15],
            ['id' => 59871, 'name' => 'cacheFiles', 'pef_item_id' => 59869, 'order_no' => 20],
            ['id' => 59872, 'name' => 'permissionFiles', 'pef_item_id' => 59869, 'order_no' => 25],
            ['id' => 59873, 'name' => 'allThree', 'pef_item_id' => 59869, 'order_no' => 30],
            ['id' => 59874, 'name' => 'allPermgroups', 'pef_item_id' => 22147, 'order_no' => 1860],
            ['id' => 59875, 'name' => 'clearPermissionC', 'pef_item_id' => 22148, 'order_no' => 25],
            ['id' => 59876, 'name' => 'apAllContainers', 'pef_item_id' => 59874, 'order_no' => 20],
            ['id' => 59877, 'name' => 'clearCrudA', 'pef_item_id' => 59876, 'order_no' => 15],
            ['id' => 59878, 'name' => 'clearCacheA', 'pef_item_id' => 59876, 'order_no' => 20],
            ['id' => 59879, 'name' => 'clearPermissionA', 'pef_item_id' => 59876, 'order_no' => 25],
            ['id' => 59880, 'name' => 'clearAllA', 'pef_item_id' => 59876, 'order_no' => 30],
            ['id' => 59881, 'name' => 'clearPermission', 'pef_item_id' => 53844, 'order_no' => 45],
            ['id' => 59964, 'name' => 'dropdownItemEvent', 'pef_item_id' => 22144, 'order_no' => 1850],
            ['id' => 59965, 'name' => 'dropdownContainerEvent', 'pef_item_id' => 22144, 'order_no' => 1860],
            ['id' => 59967, 'name' => 'tabActions', 'pef_item_id' => 21513, 'order_no' => 90],
            ['id' => 59968, 'name' => 'containerActions', 'pef_item_id' => 59967, 'order_no' => 65],
            ['id' => 60180, 'name' => 'removeRedundantFiles', 'pef_item_id' => 22147, 'order_no' => 1865],
        
        ];

    
        foreach ($data as $row) {
            DB::table('atest')->insert($row);
        }
    }
};
