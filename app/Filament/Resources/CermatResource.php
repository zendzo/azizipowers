<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CermatResource\Pages;
use App\Filament\Resources\CermatResource\RelationManagers;
use App\Models\Cermat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CermatResource extends Resource
{
    protected static ?string $model = Cermat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\Section::make('Diisi oleh pelapor')
                    ->description('(Filled by reporter)')
                    ->schema([
                        Forms\Components\Textarea::make('case_description')
                            ->label('Uraian (Details)'),
                        Forms\Components\Textarea::make('value_of_loss')
                          ->label('Nilai Kerugian (Value of loss)')
                    ]),
                Forms\Components\Section::make()
                      ->schema([
                        Forms\Components\Select::make('project_id')
                            ->label('Lokasi (Site)')
                            ->relationship(name: 'project', titleAttribute: 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('location')
                            ->label('Area')
                            ->options([
                              'example 1' => 'Location 1',
                              'example 2' => 'Location 2'
                            ])
                            ->native(false),
                        Forms\Components\DatePicker::make('date')
                            ->label('Tanggal (Date)'),
                        Forms\Components\TimePicker::make('time')
                              ->label('Waktu (Time)')
                      ])->columns(2),
              Forms\Components\Section::make()
                    ->schema([
                      Forms\Components\Textarea::make('immidiate_action_taken')
                          ->label('Tindakan langsung yang dilakukan (Immediate action taken)'),
                      Forms\Components\Toggle::make('stop_card')
                          ->label('STOP Card Issued?')
                    ]),
              Forms\Components\Section::make('Penyebab langsung (Immediate causes)')
                    ->schema([
                      Forms\Components\Select::make('unsafe_act_id')
                        ->label('- Tindakan tidak aman/Unsafe Acts')
                        ->options([
                          '2' => '1.1 Tidak taat prosedur atau instruksi',
                          '3' => '1.1 Gagal shutdown atau mengamankan proses',
                          '4' => '1.1 Tidak memberi peringatan / informasi',
                          '5' => '1.1 Membawa B3 tanpa pengaman',
                          '6' => '1.1 Bekerja pada parameter atau kecepatan yang salah',
                          '7' => '1.1 Melaksanakan pengangkatan atau pemuatan berbahaya',
                          '8' => '1.1 Menggunakan alat melebihi batas keselamatan',
                          '9' => '1.1 Bekerja tanpa wewenang',
                          '10' => '1.2 Memperbaiki alat yang sedang aktif',
                          '11' => '1.2 Menggunakan material, perkakas, alat yang kurang/rusak',
                          '12' => '1.2 Salah menggunakan material, perkakas, alat',
                          '13' => '1.3 Mematikan atau melepas alat keselamatan',
                          '14' => '1.4 Tidak memakai PPE',
                          '15' => '1.4 Memakai PPE secara tidak benar',
                          '16' => '1.5 Posisi, postur, penempatan perkerjaan yang tidak aman',
                          '17' => '1.5 Ketidakmampuan karena obat-obatan',
                          '18' => '1.5 Tidak memeriksa alat sebelum penggunaan',
                          '19' => '1.5 Senda gurau berlebihan (horseplay)',
                          '20' => '1.5 Salah manual handling',
                        ]),
                    Forms\Components\Select::make('unsafe_condition_id')
                        ->label('- Kondisi tidak aman/Unsafe Conditions')
                        ->options([
                          '12' => '2.1 Alat tanpa sertifikat, kode warna, tanda',
                          '13' => '2.1 Sistem komunikasi tidak cukup',
                          '14' => '2.1 Alat, perkakas kurang/rusak',
                          '15' => '2.1 B3 yang tidak teridentifikasi',
                          '16' => '2.2 Sistem kendali proses yang cacat',
                          '17' => '2.2 Sistem komunikasi tidak cukup',
                          '18' => '2.2 Pelindung atau batas keselamatan yang kurang/rusak',
                          '19' => '2.2 Tidak ada tanda',
                          '111' => '2.2 Alat berputar tanpa pelindung',
                          '112' => '2.3 Memakai PPE yang kurang/rusak',
                          '113' => '2.4 Kondisi fisik',
                          '113' => '2.5 Kondisi jalan atau jalur yang buruk',
                          '114' => '2.5 Area yang terlalu padat atau terhalang',
                          '115' => '2.5 Iklim ekstrim',
                          '116' => '2.5 Paparan ekstrim (suara, suhu, emisi, debu)',
                          '117' => '2.5 Bahaya kebakaran atau ledakan',
                          '118' => '2.5 Penerangan tidak cukup',
                          '119' => '2.5 Ventilasi tidak cukup',
                          '110' => '2.5 Paparan ekstrim (suara, suhu, emisi, debu)',
                          '122' => '2.5 Paparan berbahaya (RA, bahan kimia, hidrokarbon)',
                          '123' => '2.5 Housekeeping buruk, tidak teratur',
                        ])
                    ])->columns(2),
                Forms\Components\Section::make()
                      ->schema([
                        Forms\Components\Textarea::make('required_recomendation')
                          ->label('Saran pencegahan & perbaikan (Suggestion for prevention & improvement)')
                      ]),
                Forms\Components\Section::make('Pelapor - Diisi jika diperlukan / Filled if necessary')
                      ->schema([
                        Forms\Components\TextInput::make('reported_by')
                          ->label('Nama (Name)'),
                        Forms\Components\TextInput::make('reported_posistion')
                          ->label('Bagian (Entity)'),
                          Forms\Components\Select::make('reporter_status')
                          ->label('Perusahaan (Co.)')
                          ->options([
                            'company 1' => 'Company 1',
                            'company 2' => 'Company 2'
                          ]),
                          Forms\Components\TextInput::make('reported_by_mail')
                            ->label('Email'),
                          Forms\Components\Toggle::make('feedback_togle')
                            ->label('Memerlukan feedback / Do you require feedback?')
                            ->columns(1)
                      ])
                      ->columns(2),
                Forms\Components\Section::make('Atasan Pelapor (Line Supervisor)')
                          ->schema([
                            Forms\Components\Select::make('reporter_supervisor_id')
                              ->label('')
                              ->options([
                                'supervisor 1' => 'Supervisor 1',
                                'supervisor 2' => 'Supervisor 2',
                              ])
                          ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCermats::route('/'),
            'create' => Pages\CreateCermat::route('/create'),
            'edit' => Pages\EditCermat::route('/{record}/edit'),
        ];
    }
}
