<?php

namespace DfyTech\Weather\Console;

use Illuminate\Console\Command;


class InstallationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'weather:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'weather instalation wizard';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() 
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() 
    {
        $env = '';
        $path = base_path('.env');

        $this->line(PHP_EOL);
        $this->line('---------------------------------------------------------');
        $this->line('         Wellcome to the Weather installation');
        $this->line('---------------------------------------------------------');
        
        $weather_url = $this->ask('insert your Weather provider URL ?');
        $env  .=  'WEATHER_URL=' . $weather_url . PHP_EOL;
        $weather_api_key = $this->ask('insert your Weather api key ?');
        $env  .=  'WEATHER_API_KEY=' . $weather_api_key . PHP_EOL;

        $ip_url = $this->ask('insert your IP to locattion URL ?');
        $env  .=  'IP_URL=' . $ip_url . PHP_EOL;
        $ip_api_key = $this->ask('insert your IP to locattion api key ?');
        $env  .=  'IP_API_KEY=' . $ip_api_key . PHP_EOL;
        
        $this->line($env);
        
        if($this->confirm('your data is correct ?')){
            if (file_exists($path)) {
                $file = file_get_contents($path);
                file_put_contents($path, $file . PHP_EOL . $env);

            }
            $this->line(PHP_EOL);
            $this->line('---------------------------------------------------------');
            $this->line(PHP_EOL);
            $this->call('migrate');
            $this->info('Installation Finish');
            $this->line('---------------------------------------------------------');
        } else {
            $this->error('Installation canceled!');
        }
    }

}