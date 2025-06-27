public function up()
{
    Schema::table('temp_memb', function (Blueprint $table) {
        $table->unsignedBigInteger('street_id')->nullable()->change();
        $table->string('street_name', 100)->nullable()->after('street_id');
    });
}