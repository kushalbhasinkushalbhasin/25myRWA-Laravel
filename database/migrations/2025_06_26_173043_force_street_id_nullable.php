public function up()
{
    // Use raw SQL to guarantee the change
    \DB::statement("ALTER TABLE temp_memb MODIFY street_id BIGINT UNSIGNED NULL");
}

public function down()
{
    \DB::statement("ALTER TABLE temp_memb MODIFY street_id BIGINT UNSIGNED NOT NULL");
}