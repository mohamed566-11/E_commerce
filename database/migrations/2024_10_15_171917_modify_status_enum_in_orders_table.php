<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // تعديل الحقل "status_delivery" من ENUM لإضافة القيم الجديدة بشكل صحيح
        DB::statement("ALTER TABLE `orders` MODIFY `status` ENUM('pending', 'completed', 'cancelled', 'delivered')");
    }

    public function down()
    {
        // في حالة التراجع عن الترحيل، يمكنك استعادة القيم الأصلية
        DB::statement("ALTER TABLE `orders` MODIFY `status` ENUM('pending', 'completed', 'cancelled')");
    }

};
