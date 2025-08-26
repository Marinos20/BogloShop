<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalePeriodToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Ajouter après selling_price (qui existe dans ta table)
            $table->timestamp('sale_starts_at')->nullable()->after('selling_price');
            $table->timestamp('sale_ends_at')->nullable()->after('sale_starts_at');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sale_starts_at', 'sale_ends_at']);
        });
    }
}
