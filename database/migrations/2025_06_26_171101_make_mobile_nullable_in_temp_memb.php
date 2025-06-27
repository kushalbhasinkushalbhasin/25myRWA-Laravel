public function up()
{
    Schema::table('temp_memb', function (Blueprint $table) {
        $table->string('mobile', 20)->nullable()->change();
    });
}

public function down()
{
    Schema::table('temp_memb', function (Blueprint $table) {
        $table->string('mobile', 20)->nullable(false)->change();
    });
}