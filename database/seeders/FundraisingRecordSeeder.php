<?php

namespace Database\Seeders;

use App\Models\FundraisingRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundraisingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $record = new FundraisingRecord();
        $record->txhash = "0x5881437a3530e1cb48139eee98cf6d53171695b45835f56a771376904824fdf9";
        $record->amount = 300.00;
        $record->save();

        $record = new FundraisingRecord();
        $record->txhash = "0x82dd71bfc86807c73fae1adba3af74fe67caff06ea73f434147d5163bf863e53";
        $record->amount = 50.00;
        $record->save();

        $record = new FundraisingRecord();
        $record->txhash = "0xe56e32c45324b0a5a9080e59beb88d0c72d645fcb830cab55b079f1a51a72a69";
        $record->amount = 10.00;
        $record->save();

        $record = new FundraisingRecord();
        $record->txhash = "0x5b2c00b5015b628d0be9f460bc6414180e93e863869d2e787c85ff6a638a557d";
        $record->amount = 1000.00;
        $record->save();

        $record = new FundraisingRecord();
        $record->txhash = "0x21b15b30dfe9d263ade3fb49000042520238a6109d22b9507de44fd08c6a4dd0";
        $record->amount = 230.00;
        $record->save();

        $record = new FundraisingRecord();
        $record->txhash = "0x879eab1f07ff69c81f65f70c07e6e7645e53b8b73ff84977b74e517ad4488742";
        $record->amount = 120.00;
        $record->save();
    }
}
