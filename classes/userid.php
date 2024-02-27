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

namespace local_mdl81063;

use core\context;
use tool_usertours\tour;

/**
 * Class userid
 *
 * @package    local_mdl81063
 * @copyright  2024 Andrew Lyons <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class userid extends \tool_usertours\local\filter\base {
    /**
     * The name of the filter.
     *
     * @return  string
     */
    public static function get_filter_name() {
        return 'userid';
    }

    /**
     * Retrieve the list of available filter options.
     *
     * @return  array                   An array whose keys are the valid options
     *                                  And whose values are the values to display
     */
    public static function get_filter_options(): array {
        return array_map(
            fn ($admin) => $admin->username,
            \get_admins(),
        );
    }

    /**
     * Check whether the filter matches the specified tour and/or context.
     *
     * @param   tour        $tour       The tour to check
     * @param   context     $context    The context to check
     * @return  boolean
     */
    public static function filter_matches(tour $tour, context $context) {
        global $USER;

        $values = $tour->get_filter_values(self::get_filter_name());
        if (empty($values) || empty($values[0])) {
            // There are no values configured, meaning all.
            return true;
        }

        // Check whether any of the selected values match the current user.
        return in_array($USER->id, $values);
    }

    /**
     * Add the form elements for the filter to the supplied form.
     *
     * @param   MoodleQuickForm $mform      The form to add filter settings to.
     */
    public static function add_filter_to_form(\MoodleQuickForm &$mform) {
        $options = [
            static::ANYVALUE => get_string('all'),
        ];
        $options += static::get_filter_options();

        $filtername = static::get_filter_name();
        $key = "filter_{$filtername}";

        $mform->addElement('select', $key, get_string($key, 'local_mdl81063'), $options, [
            'multiple' => true,
        ]);
        $mform->setDefault($key, static::ANYVALUE);
        $mform->addHelpButton($key, $key, 'local_mdl81063');
    }
}
