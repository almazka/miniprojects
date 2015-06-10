var re = /^\d{1,2}\-\d{1,2}\-\d{4}$/;
var re2 = /^\d\d?\-\d\d?\-\d{4}$/;

print(re.test("25-02-2012"));
print(re.test("25-2-2012"));
print(re.test("01-12-2012"));
print(re.test("5-02-2012"));