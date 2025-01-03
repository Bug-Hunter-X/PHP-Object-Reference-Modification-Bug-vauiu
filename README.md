# PHP Object Reference and Modification Bug

This repository demonstrates a common yet subtle bug in PHP related to object references and modifications within functions. The bug occurs when an attempt is made to modify the object by reassigning a new object to the function parameter, rather than directly changing the object's properties.

The `bug.php` file contains code showcasing the problematic behavior. The `bugSolution.php` file provides a corrected version demonstrating how to avoid this issue.  The core problem stems from how PHP handles references passed to functions. 