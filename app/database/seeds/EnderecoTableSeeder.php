<?php
 
class EnderecoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('endereco')->delete();
 
        Endereco::create(array(
            'user_id' 		=> User::first()->id,
            'endereco' 		=> 'Rua XYZ',
            'numero'		=> 123,
            'complemento'	=> 'Apt 12',
            'cep'			=> 12019201
        ));

        Endereco::create(array(
            'user_id' 		=> User::first()->id,
            'endereco' 		=> 'Rua XPTO',
            'numero'		=> 987,
            'complemento'	=> 'Predio B',
            'cep'			=> 87382733
        ));
    }
 
}