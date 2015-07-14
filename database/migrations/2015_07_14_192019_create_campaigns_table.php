<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('campaign_name');
			$table->string('campaign_phone_number');
			$table->integer('campaign_inbox_id');
			$table->timestamp('campaign_start_date');
			$table->timestamp('campaign_end_date');
			$table->boolean('duplicate');

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
		Schema::drop('campaigns');
	}

}
