<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Hook callbacks for local_mdl81063
 *
 * @package    local_mdl81063
 * @copyright  2024 Andrew Lyons <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$callbacks = [
    [
        'hook' => \tool_usertours\hook\before_serverside_filter_fetch::class,
        'callback' => \local_mdl81063\callback::class . '::example_serverside_hook',
    ],
    [
        'hook' => \tool_usertours\hook\before_clientside_filter_fetch::class,
        'callback' => \local_mdl81063\callback::class . '::example_clientside_hook',
    ],
];
