public function up()
{
    Schema::table('temp_memb', function (Blueprint $table) {
        $table->unsignedBigInteger('street_id')->nullable()->change();
    });
}

public function down()
{
    Schema::table('temp_memb', function (Blueprint $table) {
        $table->unsignedBigInteger('street_id')->nullable(false)->change();
    });
}