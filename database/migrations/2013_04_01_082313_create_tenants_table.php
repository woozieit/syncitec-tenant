<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sede_id');
            $table->string('name_manager', 50);
            $table->string('lastname_manager', 100);
            $table->string('email_manager', 100)->nullable();
            $table->string('phone_manager', 20);
            $table->enum('type_document_manager', ['DNI', 'RUC', 'CE']);
            $table->string('document_manager', 20)->nullable();

            $table->string('razon_social_business');
            $table->string('address_business')->nullable();
            $table->string('name_business')->comment('Nombre comercial');
            $table->string('phone_business', 20)->nullable();
            $table->date('birthday_business')->nullable();
            $table->string('email_business', 100)->nullable();
            $table->string('document_business', 20)->nullable();
            $table->string('country_business')->nullable();

            $table->string('subdomain');
            $table->string('logo')->nullable();
            $table->enum('status', ['active', 'inactive', 'demo', 'retired']);
            $table->string('color_business')->nullable();

            $table->foreignId('account_id')->constrained();
            $table->date('due_date');
            $table->tinyInteger('day_pay');
            $table->decimal('monto', 8, 2);

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
