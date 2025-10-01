<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ubs;
use App\Models\Remedio;

class UbsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Pega os remédios que já criamos
        $paracetamol = Remedio::where('nome', 'Paracetamol')->first();
        $dipirona = Remedio::where('nome', 'Dipirona')->first();
        $ibuprofeno = Remedio::where('nome', 'Ibuprofeno')->first();

        // Dados de exemplo para as UBS
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
        ];

        // Cria cada UBS e anexa os remédios
        foreach ($listaUbs as $data) {
            $ubs = Ubs::create($data);

            // Anexa os remédios na tabela de ligação (pivot) com quantidades aleatórias
            if ($paracetamol) {
                $ubs->remedios()->attach($paracetamol->id, ['quantidade' => rand(20, 100)]);
            }
            if ($dipirona) {
                $ubs->remedios()->attach($dipirona->id, ['quantidade' => rand(10, 50)]);
            }
            if ($ibuprofeno && $ubs->id === 1) { // Apenas a primeira UBS terá Ibuprofeno
                $ubs->remedios()->attach($ibuprofeno->id, ['quantidade' => rand(30, 80)]);
            }
        }
    }
}