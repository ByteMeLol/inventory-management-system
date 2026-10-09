<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $categories = [
            'Material Dasar' => ['Basic Materials', 'Core building materials such as sand, cement, stone, bricks, blocks, and rebar.'],
            'Kayu & Atap' => ['Wood & Roofing', 'Wood, plywood, timber, and roofing materials such as tiles, asbestos, sheet metal, and tarpaulins.'],
            'Cat & Finishing' => ['Paint & Finishing', 'Paint for walls, wood, and metal, plus thinner, waterproofing, and adhesive products.'],
            'Lantai & Dinding' => ['Flooring & Walls', 'Floor and wall coverings including ceramic, granite, skirting, and trim profiles.'],
            'Pipa & Listrik' => ['Plumbing & Electrical', 'Plumbing supplies such as PVC pipes, faucets, and tanks, plus cables, lights, and switches.'],
            'Paku & Alat' => ['Nails & Hardware', 'Small hardware such as nails, bolts, screws, hinges, padlocks, and tools.'],
        ];

        foreach ($categories as $oldName => [$name, $description]) {
            DB::table('categories')->where('name', $oldName)->update([
                'name' => $name,
                'slug' => str($name)->slug(),
                'description' => $description,
            ]);
        }

        $financeCategories = [
            'Penjualan Produk' => 'Product Sales',
            'Layanan Jasa' => 'Services',
            'Pendapatan Lain-lain' => 'Other Income',
            'Gaji Karyawan' => 'Employee Salaries',
            'Sewa Gedung' => 'Building Rent',
            'Listrik & Air' => 'Electricity & Water',
            'Internet & Telepon' => 'Internet & Telephone',
            'Pemasaran & Iklan' => 'Marketing & Advertising',
            'Perawatan & Perbaikan' => 'Maintenance & Repairs',
            'Transportasi & Logistik' => 'Transport & Logistics',
            'Pembelian Stok' => 'Stock Purchases',
        ];

        foreach ($financeCategories as $oldName => $name) {
            DB::table('finance_categories')->where('name', $oldName)->update([
                'name' => $name,
                'slug' => str($name)->slug(),
            ]);
        }

        $defaults = [
            'currency_symbol' => 'TZS',
            'currency_fraction_digits' => '0',
            'currency_thousand_separator' => ',',
            'currency_decimal_separator' => '.',
        ];

        $legacyDefaults = [
            'currency_symbol' => ['Rp'],
            'currency_fraction_digits' => ['0'],
            'currency_thousand_separator' => ['.'],
            'currency_decimal_separator' => [','],
        ];

        foreach ($defaults as $key => $value) {
            $current = Setting::query()->where('key', $key)->value('value');

            if ($current === null || in_array($current, $legacyDefaults[$key], true)) {
                Setting::set($key, $value);
            }
        }
    }

    public function down(): void
    {
        Setting::set('currency_symbol', 'Rp');
        Setting::set('currency_fraction_digits', '0');
        Setting::set('currency_thousand_separator', '.');
        Setting::set('currency_decimal_separator', ',');
    }
};
