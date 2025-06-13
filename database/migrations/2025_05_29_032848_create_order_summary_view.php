<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW order_summary_view AS
            SELECT
                a.id AS order_id,
                b.name AS customer_name,
                SUM(c.quantity * d.price) AS total_price,
                a.created_at,
                a.updated_at
            FROM orders a
            JOIN customers AS b ON a.customer_id = b.id
            JOIN orderitems AS c ON a.id = c.order_id
            JOIN drinks AS d ON d.id = c.drinks_id
            GROUP BY a.id, b.name, a.created_at, a.updated_at
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS order_summary_view");
    }
};
