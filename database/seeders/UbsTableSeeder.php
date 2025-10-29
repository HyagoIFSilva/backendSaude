<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ubs;
use App\Models\Remedio;

class UbsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Limpa a tabela antes de popular (opcional, mas bom para testes repetidos)
        // DB::table('remedio_ubs')->truncate(); // Descomente se quiser limpar a relação
        // Ubs::truncate(); // Descomente se quiser limpar as UBSs

        $paracetamol = Remedio::where('nome', 'Paracetamol')->first();
        $dipirona = Remedio::where('nome', 'Dipirona')->first();
        $ibuprofeno = Remedio::where('nome', 'Ibuprofeno')->first();

        // Lista expandida de UBSs na Zona Leste de SP e proximidades
        $listaUbs = [
            [
                'nome' => 'UBS Jardim Etelvina',
                'latitude' => -23.578010,
                'longitude' => -46.406028,
                'descricao' => 'Unidade de referência na região leste.',
            ],
            [
                'nome' => 'UBS Guaianases I',
                'latitude' => -23.573918,
                'longitude' => -46.408272,
                'descricao' => 'Atendimento geral e farmácia popular.',
            ],
            [
                'nome' => 'AMA/UBS Integrada Cidade Tiradentes',
                'latitude' => -23.595600,
                'longitude' => -46.405900,
                'descricao' => 'Grande unidade com diversas especialidades.',
            ],
            [
                'nome' => 'UBS Fazenda do Carmo',
                'latitude' => -23.585500,
                'longitude' => -46.435700,
                'descricao' => 'Próxima ao Parque do Carmo.',
            ],
            [
                'nome' => 'UBS Jardim Soares',
                'latitude' => -23.568100,
                'longitude' => -46.418300,
                'descricao' => 'Atendimento à comunidade local.',
            ],
             [
                'nome' => 'UBS Vila Curuçá Velha',
                'latitude' => -23.527300,
                'longitude' => -46.410900,
                'descricao' => 'Localizada em São Miguel Paulista.',
            ],
             [
                'nome' => 'UBS Itaim Paulista',
                'latitude' => -23.509500,
                'longitude' => -46.401100,
                'descricao' => 'Amplo atendimento na região do Itaim.',
            ],
            [
                'nome' => 'UBS Cidade Kemel (Poá)', // Cidade vizinha
                'latitude' => -23.541400,
                'longitude' => -46.368000,
                'descricao' => 'Atende a população de Poá, próxima a Guaianases.',
            ],
        ];

        // Cria cada UBS e anexa os remédios
        foreach ($listaUbs as $data) {
            // Cria a UBS ou a encontra se já existir pelo nome
            $ubs = Ubs::updateOrCreate(['nome' => $data['nome']], $data);

            // Anexa os remédios com quantidades aleatórias
            // Garante que todos tenham Paracetamol e Dipirona
            if ($paracetamol) {
                // attach() pode adicionar duplicatas se rodar o seeder várias vezes
                // syncWithoutDetaching() é mais seguro: adiciona se não existir, atualiza se existir
                $ubs->remedios()->syncWithoutDetaching([
                    $paracetamol->id => ['quantidade' => rand(20, 100)]
                ]);
            }
            if ($dipirona) {
                 $ubs->remedios()->syncWithoutDetaching([
                    $dipirona->id => ['quantidade' => rand(10, 50)]
                ]);
            }
            // Ibuprofeno apenas em algumas UBSs (IDs ímpares, por exemplo)
            if ($ibuprofeno && ($ubs->id % 2 != 0)) {
                 $ubs->remedios()->syncWithoutDetaching([
                    $ibuprofeno->id => ['quantidade' => rand(0, 80)] // Pode ter 0
                ]);
            }
        }
    }
}