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

namespace format_topcoll\output\courseformat\content;

use stdClass;

/**
 * Contains the section controls output class.
 *
 * @package   format_topcoll
 * @copyright 2022 Andrew Lyons <andrew@nicols.co.uk>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class section extends \core_courseformat\output\local\content\section {

    public function get_template_name(): string {
        return 'format_topcoll/local/content/section';
    }

    public function export_for_template(\renderer_base $output): stdClass {
        $data = parent::export_for_template($output);

        unset($data->collapsemenu);


        if (!$this->format->get_section_number()) {
            $addsectionclass = $this->format->get_output_classname('content\\addsection');
            $addsection = new $addsectionclass($this->format);
            $data->numsections = $addsection->export_for_template($output);
            $data->insertafter = true;
        }

        return $data;
    }
}
