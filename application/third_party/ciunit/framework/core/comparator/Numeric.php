<?php

/**
 * CIUnit
 *
 * Copyright (c) 2013, Agop Seropyan <agopseropyan@gmail.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Agop Seropyan nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    CIUnit
 * @subpackage Comparator
 * @author     Agop Seropyan <agopseropyan@gmail.com>
 * @copyright  2012, Agop Seropyan <agopseropyan@gmail.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @since      File available since Release 1.0.0
 */

/**
 * Compares two numeric values for equality
 *
 * @package CIUnit
 * @subpackage Comparator
 * @author Agop Seropyan <agopseropyan@gmail.com>
 * @copyright 2012, Agop Seropyan <agopseropyan@gmail.com>
 * @license http://www.opensource.org/licenses/BSD-3-Clause The BSD 3-Clause
 *          License
 * @since File available since Release 1.0.0
 */
class CIUnit_Framework_Comparator_Numeric extends CIUnit_Framework_Comparator_Scalar
{

    /**
     * (non-PHPdoc)
     * 
     * @see CIUnit_Framework_Comparator_Scalar::accepts()
     */
    public function accepts ($expected, $actual)
    {
        return (is_numeric($expected) && is_numeric($actual) &&
                 ! is_double($actual) && ! is_double($expected));
    }

    /**
     * (non-PHPdoc)
     * 
     * @see CIUnit_Framework_Comparator_Scalar::assertEquals()
     */
    public function assertEquals ($expected, $actual, $delta = 0, 
            $canonicalize = FALSE, $ignoreCase = FALSE, array &$processedObjects = array())
    {
        
        // Finds whether a value is infinite
        if (is_infinite($actual) && is_infinite($expected)) {
            return;
        }
        
        // Find whether a value is not a number
        if (is_nan($actual) && is_nan($expected)) {
            return;
        }
        
        // Check for nan and infinite + compare with delta
        if ((is_infinite($actual) xor is_infinite($expected)) ||
                 (is_nan($actual) xor is_nan($expected)) ||
                 abs($actual - $expected) > $delta) {
            
            throw new CIUnit_Framework_Exception_ComparissonFailure($expected, 
                    $actual, '', '', 
                    sprintf('Failed asserting that %s matches expected %s.', 
                            CIUnit_Util_Type::export($actual), 
                            CIUnit_Util_Type::export($expected)));
        }
    }
}

?>