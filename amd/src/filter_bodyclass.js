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
 * TODO describe module filter_bodyclass
 *
 * @module     local_mdl81063/filter_bodyclass
 * @copyright  2024 Andrew Lyons <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Checks whether the configured CSS selector exists on this page.
 *
 * @param {array} tourConfig  The tour configuration.
 * @returns {boolean}
 */
export const filterMatches = function (tourConfig) {
    const filterValues = tourConfig.filtervalues.bodyclass.class;
    if (filterValues[0]) {
        return document.body.classList.contains(filterValues[0]);
    }
    return true;
};
