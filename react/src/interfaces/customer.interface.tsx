export interface Customer {
  id: number,
  name: string,
  email: string,
  phone: string,
  address: string,
}

const customerDefault: Customer = {
  id: 0,
  name: "",
  email: "",
  phone: "",
  address: "",
};

export default customerDefault;
