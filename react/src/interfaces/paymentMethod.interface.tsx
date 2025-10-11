export interface PaymentMethod {
  paymentMethodId: number,
  methodName: string,
}

const paymentMethodDefault: PaymentMethod = {
  paymentMethodId: 0,
  methodName: "",
};

export default paymentMethodDefault;
