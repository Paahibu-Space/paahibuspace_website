<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateAdminPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:update-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role_id = 1; // Assuming Super Admin is ID 1
        $role = \App\Models\AdminRole::find($role_id);
        if ($role) {
            $permissions = [
                "Admin Manage",
                "Blogs Manage",
                "Programs Manage",
                "Stories Manage",
                "Partners Manage",
                "Impact Stats Manage",
                "Team Members",
                "Newsletter Manage",
                "Testimonial",
                "General Settings"
            ];

            $formatted_permissions = array_map(function($p) {
                return strtolower(str_replace(' ', '_', $p));
            }, $permissions);

            $role->permission = json_encode($formatted_permissions);
            $role->save();
            $this->info('Admin permissions updated successfully for Role ID 1.');
        } else {
            $this->error('Admin Role ID 1 not found.');
        }
    }
}
